<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

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
// logout routes
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
}); // user logout route
Route::get('/admin-logout', function () {
    Session::forget('admin');
    return redirect('/admin');
}); // admin logout route

// paystack payment gateway routes
Route::post('/pay', [PaymentController::class,'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class,'handleGatewayCallback']);
// products routes
Route::get('/',[ProductController::class,'index']);
Route::get('/search',[ProductController::class,'search_products']);
Route::get('/removecart/{id}',[ProductController::class,'remove']);
Route::post('/ordernow',[ProductController::class,'order_now']);
Route::get('/cartlist',[ProductController::class,'cartlist']);
// Route::get('/cartlist',[UserController::class,'user_data']);
Route::get('/checkout',[ProductController::class,'checkout']);
Route::post('/addtocart',[ProductController::class,'cart']);
Route::get('/product/{id}',[ProductController::class,'product']);
Route::get('/manage-products',[ProductController::class,'products_all']);
// login and registration routes
Route::view('/register','register');
Route::view('login','login');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
// admin routes
Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin',[AdminController::class,'login']);
Route::get('/dashboard',[AdminController::class,'admin_details']);
Route::get('/dashboard',[ProductController::class,'recent_order']);
Route::post('/profile-picture',[AdminController::class,'profile_picture']);
Route::post('/add-category',[ProductController::class,'add_category']);
Route::post('/add-product',[ProductController::class,'add_products']);
Route::get('/edit-product/{id}',[ProductController::class,'show_product']); // show product according to their id
Route::post('/update-product',[ProductController::class,'update_products']);
Route::get('/delete-product/{id}',[ProductController::class,'delete_product']); // show product according to their id


