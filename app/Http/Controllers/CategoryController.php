<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Image;

class CategoryController extends Controller
{
    //

    public function index()
    {
        if(Auth::user())
        {
            $user= Auth::user();
            if($user->is_admin)
            {
                $categories = Category::orderBy('id', 'desc')->get();
                return view('backend.pages.category.index')->with('categories', $categories);
            }
            else{
                return redirect()->route('admin.index');
            }
            
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function create()
    {
        if(Auth::user())
        {
            $user= Auth::user();
            if($user->is_admin)
            {
                $parentCat= Category::orderBy('name','desc')->where('parent_id',NULL)->get();
                return view('backend.pages.category.create')->with('parentCat',$parentCat);
            }
            else{
                return redirect()->route('admin.index');
            }
            
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'category_image' => 'image',

        ],

        [
            'name.required' => 'Please enter a category name',
            'description.required' => 'Please describe your category'
        ]
    
    
       );


        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        

        // Image File storing
        if ($request->category_image) {
            
                $imagedata=$request->category_image;
                $randomName = md5(rand() . time()) . '.' . $imagedata->getClientOriginalExtension();

                $storageLocation = public_path('backend/assets/images/categoryImages/' . $randomName);
    
                // save Image to location
                Image::make($imagedata)->save($storageLocation);
                $category->image=$randomName;
    
        }

        $category->save();

        session()->flash("success","New category added!");
        return redirect()->route('admin.categories');
    }


    

    public function edit($id)
    {
        if(Auth::user())
        {
            $user= Auth::user();
            if($user->is_admin)
            {
                $category = Category::find($id);
                $parentCat= Category::orderBy('name','desc')->where('parent_id',NULL)->get();
                return view('backend.pages.category.edit',compact('category','parentCat'));
            }
            else{
                return redirect()->route('admin.index');
            }
            
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'category_image' => 'image',

        ],

        [
            'name.required' => 'Please enter a category name',
            'description.required' => 'Please describe your category'
        ]
    
    
       );


        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        

        // Image File storing
        if ($request->category_image) {
            
                 $prevImagePath= public_path('backend/assets/images/categoryImages/' . $category->image);
                 if(is_file($prevImagePath))
                 {
                     //dd(is_file($prevImagePath));
                    unlink($prevImagePath);
                 }   

             
                $imagedata=$request->category_image;
                $randomName = md5(rand() . time()) . '.' . $imagedata->getClientOriginalExtension();

                $storageLocation = public_path('backend/assets/images/categoryImages/' . $randomName);
    
                // save Image to location
                Image::make($imagedata)->save($storageLocation);
                $category->image=$randomName;
    
        }

        $category->save();

        session()->flash("success","category updated!");
        return redirect()->route('admin.categories');
      
    }

    public function delete($id)
    {
        $category = Category::find($id);        
        
        
         //dd($dbProductImages);
         //dd($product->productimages);

        if(!is_null($category))
        {
            if($category->parent_id == NULL)
            {
                //find all subcategories
                $subcategories= Category::where('parent_id',$category->id)->get();
                
                //delete subcat and their images
                foreach($subcategories as $subcat)
                {
                    $subcatImagePath= public_path('backend/assets/images/categoryImages/' . $subcat->image);
                    if(is_file($subcatImagePath))
                    {
                        unlink($subcatImagePath);
                    }   
                   
                    $subcat->delete();
                }
            }
            
            //delete main category image
            $categoryImagePath= public_path('backend/assets/images/categoryImages/' . $category->image);
            if(is_file($categoryImagePath))
            {
                unlink($categoryImagePath);
            }   
            $category->delete();
            session()->flash("success","Category has been deleted successfully");
        }
        
        
        return back();
    }
}
