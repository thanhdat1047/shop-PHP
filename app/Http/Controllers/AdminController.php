<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function error(){
        $code = request()->code;
        $errors = config('error.'.$code);
        return view('admin.error.403',$errors);
    }
}
