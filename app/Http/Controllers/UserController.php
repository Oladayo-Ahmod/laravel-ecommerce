<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    // register functionality
    function register(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('login');
    }
    // login functionality
    function login(Request $req){
        $data = User::where('email','=',$req->email)->first();
         // check if the passwords match
         if (Hash::check($req->password,$data->password)) {
            $req->session()->put('user',$data);
            return redirect('/homes');
        }
        else{
            return "incorrect username  or password";
        }
    }
}
