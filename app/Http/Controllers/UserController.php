<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        // $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); 
        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required', 
            'role'   => 'required', 
            'email'  => 'required|email|unique:users,email',  
            'password'  => 'required|confirmed|min:5',
            'password_confirmation' => 'required|min:5'

        ]);
        // $input = $request->except(['password', 'password_confirmation', 'role']);
        $input['password'] = bcrypt($request->password);
        
        DB::beginTransaction();
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]); 
            if(!empty($request->role)){
                $user->assignRole($request->role);
            }
            DB::commit();
            return redirect()->route('users.index') ->with('success', 'User created successfully'); 
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
            //return $this->sendError($e->getMessage());
        }   
    }

    public function edit(User $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Role deleted successfully');
    }
}
