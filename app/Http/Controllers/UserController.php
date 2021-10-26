<?php

namespace App\Http\Controllers;

use App\helpers\UserHelper;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $user_roles = UserHelper::UserRolesToArray($user->roles->toArray());
        $roles = Role::all();

        return view('user.edit',compact(['user', 'user_roles', 'roles']));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $roles = array_values($request->roles ?? [Role::UserRoleId()->id]);
        $request->request->remove('roles');

        $password = $request->password;
        if($request->request->has('password') && $password != ''){
            $request->request->remove('password');
            $request->request->add(['password' => Hash::make($password)]) ;
        }
        else
            $request->request->remove('password');

        $request->request->add(['user_id' => $user->id]);
        $this->validator($request);

        $user->update($request->all());
        $user->roles()->sync($roles);

        return redirect()->route('users.index')
            ->withSuccess('User updated successfully');

    }

    public function destroy( $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User deleted successfully');
    }

    protected function validator($request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => "required|string|email|unique:users,email,{$request->user_id },id",
            'password' => 'sometimes|string|min:6',
        ]);
    }
}
