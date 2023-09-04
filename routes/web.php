<?php

// use App\Models\catogeries;
use APP\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

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



});
