<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

// Admin
Route::get('admin',[AdminController::class,'index']);

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');



Route::group([ 'middleware'=>'admin_auth'],function()

{
    Route::get('admin/logout',[AdminController::class,'logout']);

     // Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
    
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('admin/category',[CategoryController::class,'index']);

    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);

    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);

    //Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.insert');

    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    
    // Route::get('admin/category/edit/{id}',[CategoryController::class,'edit']);

    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);


});