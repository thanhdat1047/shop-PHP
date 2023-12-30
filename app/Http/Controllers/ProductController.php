<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\ProductValidationRequest;
use App\Http\Requests\EditProductValidationRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function  show(Product $product){
        return view('admin.product.show')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::orderBy('name', 'ASC')->select('id','name')->get();
        $brands = Brand::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.product.create', ['colors'=> $colors,
            'brands'=>$brands
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidationRequest $request)
    {
        //
        $request->validated();
        //dd($request->brand_id);
        $genaratedImageName = 'image'.time().'-'
                            .$request->name.'-'
                            .$request->image->getClientOriginalName();
        $request->image->move(public_path('image'),$genaratedImageName);
        $product = Product::create([
            'name' => $request->input('name'),
            'image' => $genaratedImageName,
            'values' => $request->input('values'),
            'description' => $request->input('description'),
            'operating_system'=> $request->input('operating_system'),
            'brand_id' => $request->brand_id
        ]);
        //dd($product);
        $product->save();
        $product->colors()->sync($request->input('color_id'));
        dd($product);
        return redirect('/products');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product){
        $colors = Color::orderBy('name', 'ASC')->select('id','name')->get();
        $brands = Brand::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.product.edit',[
                'product'=> $product ,
                'brands' =>$brands,
                'colors'=> $colors
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductValidationRequest $request, Product $product){
        $request->validated();

        //old image
        $old_image = $product->image;
        $genaratedImageName= $old_image;

        if($request->hasFile('image')){
            $genaratedImageName = 'image'.time().'-'
                        .$request->name.'-'
                        .$request->image->getClientOriginalName();
                        $request->image->move(public_path('image'),$genaratedImageName);
        
        }
        
        //dd($genaratedImageName);
        $product->update([
                'name' => $request->input('name'),
                'operating_system' => $request->input('operating_system'),
                'description'=> $request->input('description'), 
                'values' => $request->input('values'),
                'image' => $genaratedImageName,
                'brand_id' => $request->input('brand_id')
            ]);
        $product->colors()->sync($request->input('color_id'));
        // $product = Product::Where('id',)
        return redirect()->route('admin.product.index')->with('success', 'Update successful');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Delete successful');

    }
}
