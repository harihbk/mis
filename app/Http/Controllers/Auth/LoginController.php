<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function adminlogin(){

        return view('auth.adminlogin');

    }

    public function adminauth(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);



        $credentials = $request->only('email', 'password');

        $data = User::where('email','=', $credentials['email'])->where('status',0)->orWhere('status', 3)->orWhere('status', 2)->get();

        if(!$data->count()){
            return redirect("adminlogin")->withSuccess('Oppes! You have entered invalid credentials');
        }
        if (Auth::attempt($credentials)) {
            return redirect()->intended('categorys')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("adminlogin")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function LoginUserShow(){
        return view('loginuser');
    }

    public function LoginUser($type,Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $user = User::where([ ['email', $request->only('email')]])->first();
        if(!$user){
            return Redirect::back()->withSuccess('Oppes! You have entered invalid credentials');
        }
        if($user->email_verified_at == null){
            if($request->encoded_email) {
                $decoded_email = base64_decode($request->encoded_email);
                $user = User::where('email',$decoded_email)->first();
                return view('paswordReset')->with('user',$user);
            } else {
                return Redirect::back()->withSuccess('Please Verify Your email');
            }
        }
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return Redirect::back()->withSuccess('Oppes! You have entered invalid credentials');
    }


}
