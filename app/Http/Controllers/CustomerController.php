<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\Customer\CustomerAddRequest;
use Auth;

class CustomerController extends Controller
{
    //
    public function login(){
        return view('customer.login');
    }

    public function post_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'

        ],[
            'email.required'=>'Email is not empty',
            'password.required'=>'Password is not empty'
        ]);
        $login = Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember'));
        if($login){
            return redirect()->route('home.index')->with('success', 'Login successful');
        }
        return redirect()->back()->with('error', 'Email or password is not correct!!!');
    }
    public function logout(){
        Auth::guard('cus')->logout();
        return view('home.index');
    }
    public function profile(){
        return view('customer.profile');
    }

    public function change_password(){
        return view('customer.change_password');
    }

    public function order(){
        return view('customer.order');
    }
    public function register(){
        return view('customer.register');
    }
    public function post_register(CustomerAddRequest $request)
    {
        $request->merge(['password'=>bcrypt($request->password)]);
        $customer = Customer::create($request->all());
        if($customer){
            return redirect()->route('customer.login')->with('success', 'Create new account successful');
        }
        return redirect()->back()->with('error',"Can't create new account");
    }
}
