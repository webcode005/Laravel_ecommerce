<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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

    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);

    // Category status
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    // For Coupon

    Route::get('admin/coupon',[CouponController::class,'index']);

    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);

    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);

    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);    

    // Coupon status
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);


     // For Size

    Route::get('admin/size',[SizeController::class,'index']);

    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);

    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);

    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);    

    // Size status
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);


     // For Color

    Route::get('admin/color',[ColorController::class,'index']);

    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);

    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);

    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);    

    // Color status
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);


     // For Product

    Route::get('admin/product',[ProductController::class,'index']);

    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);

    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);

    Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);    

    // product status
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);


});