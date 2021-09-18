<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login(Request $request){

      return view('frontend.auth.login');
    }

    public function postlogin(Request $request) {

        $credentials = $request->only('email', 'password');
        $status = $request->only('status');
        $user = User::where([ ['email', $request->only('email')]])->first();




        if($user){
            if($user->email_verified_at == null){
                return Redirect::back()->with('message', 'Please Verify Your email');
            }

       if($user->status != 1){
        return Redirect::back()->with('message', 'Please check the login');
       }

       if($user->user_status == 2){
        return Redirect::back()->with('message', 'User Deactivated , Please Contact admin.');
     }


        }
        if (Auth::attempt($credentials)) {

            return redirect('website');
        }
        return Redirect::back()->with('message', 'Username or password is invalid');
    }


    public function authlogout(Request $request){
        Auth::logout();
        return redirect()->intended('website');
    }

    public function profile(){
      return view('frontend.profile');
    }
}
