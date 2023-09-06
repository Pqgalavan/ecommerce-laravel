<?php

// use App\Models\catogeries;

use App\Http\Controllers\cart;
use APP\Http\Controllers\Controller;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[Frontend::class,'getitem']);
Route::get('get_cat',[Frontend::class,'get_Cat']);

Route::get('get_cat_details/{id}',[Frontend::class,'getcatproduct']);

Route::get('get_product/{id}',[Frontend::class,'getproductdetail']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    });
    Route::get('catogeries',function(){
return  view('admin.catogeries');
    });


    Route::post('addcatogery',[Controller::class,'showdata']);
    Route::get('editcatogeries',function(){
        return view('admin.editcatogeries');
    });
Route::get('view_catogeries',[Controller::class,'viewcat']);
Route::get('edit_cat/{id}',[Controller::class,'editcat']);
Route::get('dlt_cat/{id}',[Controller::class,'dltcat']);
Route::get('add_product',[Product::class,'add']);
Route::post('add_product',[Product::class,'insert']);
Route::get('get_product',[Product::class,'getproduct']);
Route::put('edited/{id}',[Controller::class,'edited'])->name('update.category');

});

Route::middleware(['auth'])->group(function(){

    Route::get('addcart/{id}',[cart::class,'addcart']);
    Route::get('/get_cart',[cart::class,'cart_item']);
    Route::get('/checkout',[cart::class,'checkout']);
    Route::post('qty_update',[cart::class,'qty_update'])->name('qty_update');
    Route::post('totalqty_update',[cart::class,'totalqty_update'])->name('totalqty_update');
    Route::get('checkoutfinal',[cart::class,'checkoutfinal']);
    Route::post('placeorder',[cart::class,'placeorder']);

    Route::get('myorders',[cart::class,'myorders']);




}
);
