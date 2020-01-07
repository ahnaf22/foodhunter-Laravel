<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\VerifyRegistration;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);


        $user = User::where('email',$request->email)->first();

        if(!is_null($user))
            {

                if($user->is_email_verified == 1)
                {
                    //email is verified
                    //lets login this user

                    if(Auth::guard('web')->attempt(['email'=> $request->email,'password'=> $request->password],$request->remember))
                    {
                        return redirect()->intended(route('homePage'));
                    } 
                    else{
                        return $this->sendFailedLoginResponse($request);
                    }
                
                }
                else{
                    //if there is a user who's email is not verified
                    //send a verification link again
                    $user->notify(new VerifyRegistration($user));

                    session()->flash('success','A re-confirmation mail is sent to you, please verify your mail');
                    return redirect('login');
                }
                
            }
            else{
                session()->flash('customerror','There is no account related to the Email');
                return redirect('login'); 
            }
        
        
    }
}
