<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Brand;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(2);
        return view('products.index',compact('products'));
    }

    public function delete($id){
        $model = Product::find($id);        
        Product::find($id)->delete();
        return redirect()->back()->with('success','Delete success');
    }
    public function product_trash(){
        $products = Product::onlyTrashed()->paginate(2);
        return view('products.product_trash',compact('products'));
    }
    public function product_un_trash($id){
        $model = Product::withTrashed()->find($id);        
        $model->restore();
        return redirect()->back()->with('success','Retore success');
    }
    public function product_foredel($id){
        $model = Product::withTrashed()->find($id);        
        $model->forceDelete();
        return redirect()->back()->with('success','Delete success');
    }
}


