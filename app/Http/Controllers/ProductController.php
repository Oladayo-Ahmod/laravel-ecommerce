<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use DB;
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
    //add to cart functionality
    function cart(Request $req){
        if (Session::has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->cart;
            $cart->save();
            return redirect('/');

        }
        else{
            return redirect('/login');
        }
    }

    // count added items in the cart
    static function CartNum(){
        if (session()->has('user')) {
            $user_id = Session::get('user')['id'];
            return Cart::where('user_id',$user_id)->count();
        }   
        else{
            return redirect('/login');
        }
    }

    // display all the products in the cart
    function cartlist(){
        $user_id = Session::get('user')['id'];
        $count = Cart::where('user_id',$user_id)->count();
        if (session()->has('user') && $count > 0) {
            $user_id = Session::get('user')['id'];
            $products = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user_id)
            ->select('products.*','carts.id as cart_id')
            ->get();
            return view("cartlist",['products'=>$products]);
        }
        else{
            return redirect('/');
        }
    }
    
    // remove product from the cart
    function remove($id){
        if (Session::has('user')) {
            Cart::destroy($id);
            return redirect('/cartlist');
        }
        else{
            return redirect('/');
        }
    }

    // search product from the database
    function search_products(Request $request){
        $search = $request->input('search');
        $product = Product::where('name','like','%'.$search.'%')->get();
        return  view('/search',['products'=> $product]);
    }

    // order now
    function checkout(){
        if (session()->has('user')) {
            $user_id = Session::get('user')['id'];
            $total = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user_id)
            ->select('products.*','carts.id as cart_id')
            ->sum('products.price');
            return view('checkout',['total'=>$total]);
        }
        else{
            return redirect('/login');
        }
    }


}
