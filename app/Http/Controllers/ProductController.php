<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class ProductController extends Controller
{
    // get all the products in the database
    function index(){
        $data = Product::all();
        return view('home',['products'=>$data]);
    }
    // display each product by its id
    function product($id){
        $product = Product::find($id);
        return view('products',['product'=>$product]);
    }
    // cart functionaliity
    function cart(Request $req){
        if (Session::has('user')) {
            $cart = new Cart;
            $cart->product_id = $req->
        }
    }
}
