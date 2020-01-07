<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
    //
    public function verify($token)
    {
        $user = User::where('remember_token',$token)->first();

        if(!is_null($user)){
            $user->remember_token=NULL;
            $user->is_email_verified=1;
            $user->save();

            session()->flash('success','You are registered Successfully! Login here');
            return redirect('login');
        }
        else{
            session()->flash('errors','sorry token Invalid'); 
            return redirect('/');
        }
        
    }
}
