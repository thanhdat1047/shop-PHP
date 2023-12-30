<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Home\ProductController as ProController;
use App\Http\Controllers\Home\BrandController as BraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/shop',[HomeController::class,'shop'])->name('home.shop');
Route::get('/brand-{id}-{slug}',[HomeController::class,'view'])->name('home.view');
Route::post('upload',[HomeController::class,'upload'])->name('home.upload');
    
//Customer
Route::get('/customer/login',[CustomerController::class,'login'])->name('customer.login'); 
Route::post('/customer/login',[CustomerController::class,'post_login'])->name('customer.login'); 
Route::get('/customer/register',[CustomerController::class,'register'])->name('customer.register'); 
Route::post('/customer/register',[CustomerController::class,'post_register'])->name('customer.register'); 

Route::group(['prefix'=>'customer','middleware'=>'cus'], function(){
    Route::get('profile',[CustomerController::class,'profile'])->name('customer.profile');
    Route::get('logout',[CustomerController::class,'logout'])->name('customer.logout');
    Route::get('order',[CustomerController::class,'order'])->name('customer.order');
    Route::get('change_password',[CustomerController::class,'change_password'])->name('customer.change_password');
    
    Route::group(['prefix'=>'product', 'as'=>'product.','namespace'=>'Home'],function(){

        Route::get('/',[ProController::class,'index'])->name('index');
        //softdelete 
        Route::get('product_del/{id}',[ProController::class, 'delete'])->name('del');

        Route::get('product_trash',[ProController::class, 'product_trash'])->name('trash');
        
        Route::get('product_un_trash/{id}',[ProController::class, 'product_un_trash'])->name('un_trash');

        Route::get('product_foredel/{id}',[ProController::class, 'product_foredel'])->name('foredel');
    });
    Route::group(['prefix'=>'brand', 'as'=>'brand.'],function(){
        Route::get('/',[BraController::class,'index'])->name('index');
        Route::get('/product_by_brand/{id}',[BraController::class,'product_by_brand'])->name('product_by_brand');
        
    });

} );

//Admin
Route::group(['prefix' =>'admin', 'middleware'=> 'auth', 'as'=>'admin.'], function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
   
    Route::get('error','AdminController@error')->name('error');
    Route::resources([
        'product' => 'ProductController',
        'brand' => 'BrandController',
        'bill' => 'BillController',
        'color' => 'ColorController',
        'role'=> 'RoleController',
        'user' => 'UserController'

    ]);
});

// Route::middleware(['auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });