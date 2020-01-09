<?php

namespace App\Http\Controllers;

use App\Notifications\SellerApproval;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user())
        {
            $user= Auth::user();
            return view('backend.pages.index',compact('user'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function allusers()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::all();
            return view('backend.pages.users.userindex',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }

    public function allsellers()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::where('is_seller',1)->get();
            return view('backend.pages.sellers.sellerindex',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }

    public function sellerRequests()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::where('seller_request',1)->get();
            return view('backend.pages.sellers.requests',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }


    public function approveseller($id)
    {
    
       $user= User::where('id',$id)->first();
       $user->is_seller= 1;
       $user->seller_request= 0;
       $user->is_verified_by_admin=1;
       $user->save();

       $user->notify(new SellerApproval(1));
       session()->flash('success','Seller Approved!');
       return back();
    }

    public function rejectseller($id)
    {
        $shop = Shop::where('user_id',$id)->first();
        $user = User::find($id);

        // delete the shop and nid Image
        $shopImagePath= public_path('backend/assets/images/shoplogos/' . $shop->shop_logo);
        $nidImagePath= public_path('backend/assets/images/sellerNid/' . $user->nid);
        if(is_file($shopImagePath))
        {
           unlink($shopImagePath);
        }   

        if(is_file($nidImagePath))
        {
           unlink($nidImagePath);
        }
        
        //set user nid null
        $user->nid=NULL;
        $user->seller_request=0;
        $user->save();

        //delete shop info
        $shop->delete();

        //mail user about rejection
        $user->notify(new SellerApproval(0));

        session()->flash("customerror","Seller request rejected!");



         return back();
    }

}
