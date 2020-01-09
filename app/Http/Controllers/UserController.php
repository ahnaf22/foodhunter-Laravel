<?php

namespace App\Http\Controllers;

use App\Notifications\SellerRequest;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    //get registered as seller
    public function registerSeller(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'location' => 'required|max:150',
            'open_time' => 'required|max:10',
            'close_time' => 'required|max:10',
            'shop_logo' => 'image',
            'nid_image' => 'image'

        ]);

        $shop = new Shop();
        $user = Auth::user();

        $shop->name=  $request->name;
        $shop->location=  $request->location;
        $shop->open_time=  $request->open_time;
        $shop->close_time=  $request->close_time;
        $shop->user_id= $user->id;

         // Image File storing
         if ($request->shop_logo ) {
            
            $shopimagedata=$request->shop_logo;
            
            $shoprandomName = md5(rand() . time()) . $user->first_name .'shop' . '.' . $shopimagedata->getClientOriginalExtension();
            
            $shopstorageLocation = public_path('backend/assets/images/shoplogos/' . $shoprandomName);
            
            // save Image to location
            Image::make($shopimagedata)->save($shopstorageLocation);
            
            $shop->shop_logo=$shoprandomName;
            
         }

         if ($request->nid_image ) {
            
            $nidimagedata=$request->nid_image;
            
            $nidrandomName = md5(rand() . time()) . $user->first_name .'seller' . '.' . $nidimagedata->getClientOriginalExtension();

            $nidstorageLocation = public_path('backend/assets/images/sellerNid/' . $nidrandomName);

            // save Image to location
            Image::make($nidimagedata)->save($nidstorageLocation);

            $user->nid=$nidrandomName;

         }

         $shop->save();

         $user->seller_request=1;
         $user->save();

         $user->notify(new SellerRequest());


         session()->flash("success","A seller request to admin is sent, please wait for verification");
         return redirect()->route('home');


    }

    public function userProfile()
    {
        if(Auth::user())
        {
            $user=Auth::user();

            return view('backend.pages.simpleUserPages.profile',compact('user'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }
}
