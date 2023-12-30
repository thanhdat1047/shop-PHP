<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    //
    public function index() {
        $brands = Brand::search()->paginate(5);
        return view('brands.index',compact('brands'));
    }
    public function product_by_brand($id){
        $brand = Brand::find($id);
        return view('brands.product',compact('brand'));
    }

    
}
