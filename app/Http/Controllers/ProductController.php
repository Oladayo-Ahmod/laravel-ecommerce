<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
        $search = $request->search;
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

    // order placement
    function order_now(Request $req){
        if ($req->session()->has('user')) {
            $user_id = Session::get('user')['id'];
            $all_cart = Cart::where('user_id',$user_id)->get();
            foreach ($all_cart as $cart) {
                $order = new Order;
                $order->user_id = $cart['user_id'];
                $order->product_id = $cart['product_id'];
                $order->status = "pending";
                $order->payment_method = $req->payment;
                $order->payment_status = "pending";
                $order->address = $req->address;
                $order->Save();
                $all_cart = Cart::where('user_id',$user_id)->delete();
            }
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    // dashboard functionality
    function products_all(){
        $products = Product::all();
        return view('manage-products',['products'=> $products]);
    }

    function add_products(Request $req){
        // validate the input
        $validate = $req->validate([
            'image'=>'required|image|max:2048|mimes:jpeg,jgp,png,gif,svg',
        ]);
        $imageName = time() . '.' . $req->image->extension();
        // store the image in the public folder
        if(!$req->image->move(public_path('assets/images'),$imageName)){ // if images is not valid
            return back()->with('error','error uploading image, check if it is image');
        }
        // new product id for the product
        $product_id = 'Id'.round(microtime(true)); 
        // instantiating the product class
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->gallery = $imageName; // product image path
        $product->quantity = $req->quantity;
        $product->product_id = $product_id;
        if($product->save()){ // if product is added
            return back()->with('success','New product added successfully');
        }
        else{
            return back()->with('error','error adding product, try later! ');
        }
    }
}
    
