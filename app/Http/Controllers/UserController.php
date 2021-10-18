<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateUserTypeRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserCreationNotification;
use App\Http\Requests\UserTypeRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
            return redirect()->intended('dashboard')
            ->withSuccess('You have Successfully loggedin');
        }
        return Redirect::back()->withSuccess('Oppes! You have entered invalid credentials');
      }

      public function dashboard(){
        return view('dashboard');
      }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type)
    {

        $role = base64_decode($type);

        $data = User::role($role)->orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeRequest $request,$type)
    {
        $input = $request->all();
        $pwd = $input['password'];
        $input['password'] = Hash::make($input['password']);
        $input['status'] = 2;
        $role_name = base64_decode($type);
        $user = User::create($input);
        $user->assignRole($role_name);
        $url_name = str_replace(' ', '', $role_name);
        $url = 'login/'.strtolower($url_name).'/'.base64_encode($user->email);
        Flash::success('User saved successfully.');
        $data = [
            'user' => $user,
            'url' => $url,
            'role' => $role_name,
            'password' => $pwd,
        ];
        Notification::send($user, new UserCreationNotification($data));
        return redirect('/users/'.$type)
                        ->with('success',$role_name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type,$id)
    {
        $user = User::with('products')->find($id);
        // dd($user);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type,$id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTypeRequest $request,$type, $id)
    {
        $input = $request->all();
        $role_name = base64_decode($type);
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();

        // $user->assignRole($request->input('roles'));

        return redirect('/users/'.$type)
                        ->with('success',$role_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type,$id)
    {
        $role_name = base64_decode($type);
        User::find($id)->delete();
        return redirect('/users/'.$type)
                        ->with('success',$role_name.' deleted successfully');
    }

}
