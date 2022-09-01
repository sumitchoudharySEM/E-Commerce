<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;

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

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function(){
    
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);


    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.insert');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('admin/coupon/update/{id}', [CouponController::class, 'update']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);


    Route::get('admin/size', [SizeController::class, 'index']);
    Route::get('admin/size/manage_size', [SizeController::class, 'manage_size']);
    Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.insert');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/size/edit/{id}', [SizeController::class, 'edit']);
    Route::post('admin/size/update/{id}', [SizeController::class, 'update']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);

    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/logout', function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error','logout successfuliy');
            return redirect('admin');
    });
});

