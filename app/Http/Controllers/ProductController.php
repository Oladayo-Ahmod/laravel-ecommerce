<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
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
            // user data
            $user_data = User::where('id','=',$user_id)->first();
            return view("cartlist",compact('products','user_data'));
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
            // total products value
            $total = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user_id)
            ->select('products.*','carts.id as cart_id')
            ->sum('products.price');
            // total products ordered
            $products = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$user_id)
            ->select('products.*','carts.id as cart_id')
            ->get();
            // user data
            $user_data = User::where('id','=',$user_id)->first();
            return view("checkout",compact('products','user_data','total'));
            // return view('checkout',['total'=>$total]);
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

    // display every product
    function products_all(){
        $products = Product::paginate(10);
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

    // add category
    function add_category(Request $request){
        $category = new Category;
        $category->name = ucfirst($request->name);
        if($category->save()){ // if product is added
            return back()->with('success','New category added successfully');
        }
        else{
            return back()->with('error','error adding category, try later! ');
        }
    }
    // show product for editing according to their id
    function show_product($id){
        $product = Product::find($id);
        return view('edit-product',['product' => $product]);
    }

    // update product functionalities
    function update_products(Request $req){
        // validate the input
        $validate = $req->validate([
            'image'=>'required|image|max:2048|mimes:jpeg,jgp,png,gif,svg',
        ]);
        $imageName = time() . '.' . $req->image->extension();
        // store the image in the public folder
        if(!$req->image->move(public_path('assets/images'),$imageName)){ // if images is not valid
            return back()->with('error','error uploading image, check if it is image');
        }
        $id = $req->id; 
        // instantiating the product class
        $product = Product::find($id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->gallery = $imageName; // product image path
        $product->quantity = $req->quantity;
        $product->product_id = $req->product_id;
        if($product->save()){ // if product is added
            return back()->with('success','Product edited successfully');
        }
        else{
            return back()->with('error','error editing product, try later! ');
        }
    }

    // delete product functionality
    function delete_product($id){
        $product = Product::find($id);
        if ($product->delete()){
            return back()->with('success','Product deleted successfully!');
        }
        else{
            return back()->with('error','Error deleting product!');
        }
    }
    // show recent order
    function recent_order(){
        $orders = DB::table('orders')->
        leftJoin('products','orders.product_id','=','products.id')->
        orderBy('orders.id','desc')->limit(3)->get();
        $count_orders = DB::table('orders')->count();
        $orders_inprogress = DB::table('orders')->where('delivery_status','in progress')->count();
        $orders_delivered = DB::table('orders')->where('delivery_status','delivered')->count();
        $orders_cancelled = DB::table('orders')->where('delivery_status','cancelled')->count();
        return view('dashboard', compact('orders','count_orders','orders_delivered','orders_inprogress','orders_cancelled'));
    }
   
}
    
