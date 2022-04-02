<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobileno' => ['required', 'numeric', 'min:11','unique:users,mobileno'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'userType'  =>[],
            'userLoginUserId' =>[],
            'userCompany'  => [],
            'userCompanyGST' => [],
            'newsletter'  => []


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobileno' =>  $data['mobileno'],
            'status' =>  1,
            'userType' =>  $data['userType'],
            'userLoginUserId' => $data['userLoginUserId'],
            'userCompany'     => $data['userCompany'],
            'userCompanyGST'  => $data['userCompanyGST'],
            'newsletter'      => (isset($data['newsletter']) && $data['newsletter']) ? $data['newsletter'] : 'option2'
        ]);
    }



    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {

            return view('auth.register')->withErrors($validator->errors());
        }

        $id = $this->create($request->all())->id;
        $user = User::find($id);
        $user->assignRole('Customer');
        $user->sendEmailVerificationNotification();
       // return  redirect()->intended('website')->with('message', 'Please Verify email with in 60 minutes.');
     //  return redirect(RouteServiceProvider::HOME);
       return view("afterregister");
       // return  redirect(route('website'))->with('message', 'Please Verify email with in 60 minutes.');
    }

    public function emailcheck(Request $request){

        $email1 = User::where('email', $request->email)->get();

        if($email1->count())
        {
            return json_encode(false);
        } else {
            return json_encode(true);
        }

    }


    public function mobilecheck(Request $request){

        $email1 = User::where('mobileno', $request->mobileno)->get();

        if($email1->count())
        {
            return json_encode(false);
        } else {
            return json_encode(true);
        }

    }

    protected function registered( Request $request, $user )
{
    Auth::logout(); // don't forget to import the facade at the top of the class use Auth;
}
}
