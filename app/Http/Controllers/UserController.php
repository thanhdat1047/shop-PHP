<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users = User::paginate(15);
        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::orderBy('name','ASC')->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ],['name.required' => 'Name is not empty',
            'email.required' => 'Email is not empty',
            'confirm_password.required' => 'Confirm password is not empty',
            'confirm_password.same' => 'Please make sure your confirm password field matches your password field.',
        ]);
        $data = [
            'name' => $request->name, 
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ];
        
        if($user = User::create($data)){
            
            if(is_array($request->role)){
                foreach ($request->role as $role_id) {
                    UserRole::create(['user_id' => $user->id, 'role_id' => $role_id]);
                }
            }
            return redirect()->route('admin.user.index');
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role_assignments = $user->getRoles->pluck('name','id')->toArray();
        $roles = Role::orderBy('name','ASC')->get();
        return view('admin.user.edit', compact('user','roles','role_assignments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required', 
            'email' => 'required|email|unique:users,email,'.$user->id,
        ];

        $messages = [
            'name.required' => 'Name is not empty',
            'email.unique' => 'Email is exists'
        ]; 

        $data = [];
        if($request->password != ''){
            $rules['confirm_password'] = 'required|same:password';
            $messages['confirm_password.required'] = 'Confirm password is not empty'; 
            $messages['confirm_password.same'] = 'Please make sure your confirm password field matches your password field.';
        }
        $request->validate($rules,$messages);

        $data = [
            'name' => $request->name, 
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,

        ];
        
        $user->update($data);
        
        if(is_array($request->role)){
            UserRole::where('user_id',$user->id)->delete();
            foreach ($request->role as $role_id) {

                UserRole::create(['user_id' => $user->id, 'role_id' => $role_id]);
            }
        
        }


        return redirect()->route('admin.user.index')->with('success', 'Update user successfull');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
