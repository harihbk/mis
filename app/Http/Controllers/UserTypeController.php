<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserTypeRequest;
use App\Http\Requests\UserTypeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserCreationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::where('status',1)->where('userType',3)->get();
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Subcategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Subcategory in storage.
     *
     * @param UserTypeRequest $request
     *
     * @return Response
     */
    public function store(UserTypeRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'mobileno' =>  $input['mobileno'],
            'status' =>  1,
            'userType' => 3,
            'user_status' => @$input['user_status'] ? @$input['user_status'] : 0
        ]);

        Flash::success('User saved successfully.');
        Notification::send($user, new UserCreationNotification($user));

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        return view('users.edit') ->with('user', $user);
    }


    /**
     * Update the specified Subcategory in storage.
     *
     * @param int $id
     * @param UpdateUserTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserTypeRequest $request)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input = $request->all();
        // dd($input);
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'mobileno' =>  $input['mobileno'],
            'user_status' => @$input['user_status'] ? @$input['user_status'] : 0
        ];
        if(!empty($input['password'])){
            $data['password'] = Hash::make($input['password']);
        }
        $user = User::where('id',$id)->update($data);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }


    /**
     * Remove the specified Subcategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        User::where('id',$id)->delete();

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }


}
