<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    // register functionality
    function register(Request $req){
        // validate registration
        $validate = $req->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            // 'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048' image upload functionality
        ]);
        // $imageName = time() . '.' . $req->image->extension(); image upload functionality
        // $req->image->move(public_path('assets/images'), $imageName); image upload functionality
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
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
}
