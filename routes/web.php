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

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
// paystack payment gateway routes
Route::post('/pay', [PaymentController::class,'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class,'handleGatewayCallback']);
// products routes
Route::get('/',[ProductController::class,'index']);
Route::get('/search',[ProductController::class,'search_products']);
Route::get('/removecart/{id}',[ProductController::class,'remove']);
Route::post('/ordernow',[ProductController::class,'order_now']);
Route::get('/cartlist',[ProductController::class,'cartlist']);
Route::get('/checkout',[ProductController::class,'checkout']);
Route::post('/addtocart',[ProductController::class,'cart']);
Route::get('/product/{id}',[ProductController::class,'product']);
// login and registration routes
Route::view('/register','register');
Route::view('login','login');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
// admin routes
Route::view('/admin','admin');
Route::post('/admin',[AdminController::class,'login']);
Route::get('/dashboard',[AdminController::class,'dashboard']);