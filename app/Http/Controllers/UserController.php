<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    // register functionality
    function register(Request $req){
        // validate registration
        $validate = $req->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|min:11',
            // 'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048' image upload functionality
        ]);
        // $imageName = time() . '.' . $req->image->extension(); image upload functionality
        // $req->image->move(public_path('assets/images'), $imageName); image upload functionality
        $user = new User;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->address = $req->address;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->save();
        return back()->with('success','Signed up successfully');
        // return redirect('login');
    }
    // login functionality
    function login(Request $req){
        // validate login
        $validate = $req->validate([
            'email'=> 'required|max:150',
            'password' => 'required',
        ]);
        $data = User::where('email','=',$req->email)->first();
         // check if the passwords match
         if (Hash::check($req->password,$data->password)) {
            $req->session()->put('user',$data);
            return redirect('/');
        }
        else{
            return back()->with('failure','incorrect username or password');
        }
    }

    // user data
    function user_data(){
        $user_id = Session::get('user')['id'];
        $data = User::where('id','=',$user_id)->first();
        // return view("cartlist",['user_data'=>$data]);
    }
}
