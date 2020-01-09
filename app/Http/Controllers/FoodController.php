<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    // frontend food details
    public function foodDetails($id)
    {

        $food= Food::find($id);
        $shopid= $food->shop_id;

        $morefoods= Food::where('shop_id',$shopid)->where('id','!=',$id)->get();
        //dd($morefoods);
        return view('frontend.foodDetailFiles.foodDetails',compact('food','morefoods'));
    }


    public function allHomemade()
    {
        $foods=Food::all();
        return view('frontend.homeFoodFiles.homemade',compact('foods'));
    }






    // backend food functions
    public function allfoods()
    {
        if(Auth::user()->is_seller)
        {
            $foods= Auth::user()->shop->foods;
           return view('backend.pages.food.index',compact('foods'));
        }
        else{
            return redirect()->route('admin.index');
        }
       
    }

    public function food_create()
    {
        if(Auth::user()->is_seller)
        {
            $categories= Category::orderBy('name','desc')->where('parent_id',NULL)->get();
            return view('backend.pages.food.create',compact('categories'));
        }
        else{
            return redirect()->route('admin.index');
        }
        
    }

    public function food_store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'image|required',
            'category_id' => 'required',

        ]);

        $food = new Food();
        $food->title = $request->title;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->slug = Str::slug($request->title);
        $food->category_id=$request->category_id;

        $food->shop_id= Auth::user()->shop->id;
        $shopname=Auth::user()->shop->name;
        //dd(Auth::user()->shop->name);


        // food Image File storing
        if ($request->product_image) {

                $imagedata=$request->product_image;
                $randomName = md5(rand() . time()) .$shopname. '.' . $imagedata->getClientOriginalExtension();

                $storageLocation = public_path('/backend/assets/images/foods/' . $randomName);
    
                // save Image to location
                Image::make($imagedata)->save($storageLocation);
    
              
                $food->image = $randomName;

        }


        
        $food->save();

        session()->flash("success","Food Item added!");
        return redirect()->route('admin.food');
    }

    public function food_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'image',
            'category_id' => 'required',

        ]);

        $food= Food::find($id);

        $food->title = $request->title;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->slug = Str::slug($request->title);
        $food->category_id=$request->category_id;
        $shopname=Auth::user()->shop->name;


          // food Image File storing
          if ($request->product_image) {


            $prevImagePath= public_path('backend/assets/images/foods/' . $food->image);
                 if(is_file($prevImagePath))
                 {
                     //dd(is_file($prevImagePath));
                    unlink($prevImagePath);
                 }   

            $imagedata=$request->product_image;
            $randomName = md5(rand() . time()) .$shopname. '.' . $imagedata->getClientOriginalExtension();

            $storageLocation = public_path('/backend/assets/images/foods/' . $randomName);

            // save Image to location
            Image::make($imagedata)->save($storageLocation);

          
            $food->image = $randomName;

          }

        $food->save();

        session()->flash("success","Food item updated!");
        return redirect()->route('admin.food');


    }

    public function food_edit($id)
    {
        if(Auth::user()->is_seller)
        {
            $food = Food::find($id);
            $categories= Category::orderBy('name','desc')->where('parent_id',NULL)->get();
            return view('backend.pages.food.edit',compact('food','categories'));
        }
        else{
            return redirect()->route('admin.index');
        }
        
    }


    public function food_delete($id)
    {
        $food= Food::find($id);

        if(!is_null($food))
        {
                 $prevImagePath= public_path('backend/assets/images/foods/' . $food->image);
                 if(is_file($prevImagePath))
                 {
                     //dd(is_file($prevImagePath));
                    unlink($prevImagePath);
                 }   
            
                 $food->delete();
        }


        session()->flash("success","Food item deleted!");
        return back();
    }
}
