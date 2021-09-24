<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            $this->authenticated();
        }
        return Redirect::back()->with('message', 'Username or password is invalid');
    }

    public function authenticated() {
        $role = Auth::user()->user_role;
        switch ($role) {
          case 'Admin':
            return redirect('/categorys');
            break;
          case 'Vendor':
            return redirect('/vendor/dashboard');
            break;
        case 'Sub Admin':
            return redirect('/subadmin/dashboard');
            break;
          default:
            return redirect('/website');
          break;
        }
   }

    public function authlogout(Request $request){
        Auth::logout();
        return redirect()->intended('website');
    }

    public function profile(){
      return view('frontend.profile');
    }

    public function passwordResetEmail($email){
        if($email) {
            $decoded_email = base64_decode($email);
            $user = User::where('email',$decoded_email)->first();
        }
        return view('paswordReset')->with('user',$user);
      }

      public function userpassword(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if($user->userType == 2){
                return redirect()->intended('/vendor/dashboard')->withSuccess('You have Successfully loggedin');
            } else {
                return redirect()->intended('/subadmin/dashboard')->withSuccess('You have Successfully loggedin');
            }
        }
        return view('')->with('user',$user);
      }

      public function subadminDashboard(){
        return view('subadmin.dashboard');
      }

      public function vendorDashboard(){
        return view('vendor.dashboard');
      }
}
