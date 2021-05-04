<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Session;
class AdminController extends Controller
{
    function login(Request $req){
        $req->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:5'
        ]);
        if($admin = Admin::where('email','=',$req->email)->first()){
            if(Hash::check($req->password,$admin->password)){
                Session::put('admin',$admin);
                return view('dashboard');
            }
            else{
                return back()->with('failure','incorrect email or password');
            }
        }
        else{
            return back()->with('failure','incorrect email or password');
        }
       
    }
}
