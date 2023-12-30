<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //    // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = Brand::orderBy('name','ASC')->limit(10)->get();
        return view('home',compact('brands'));
    }
    public function login()  {
        return view('auth/login');
    }
    public function upload(){
        $file_name = upload_image('upload');
        dd($file_name);
    }
    public function view($id){
        $brand = Brand::find($id);
        return view('about',compact('brand'));
    }
}
