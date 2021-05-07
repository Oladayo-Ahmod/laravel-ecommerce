<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Session;
class AdminController extends Controller
{
    // login page
    function index(){
         // check if user is already logged in
        if (Session::has('admin')) {
            return redirect('/dashboard');
        }
        else{
            return view('admin');
        }
    }

    // login functionality
    function login(Request $req){
        // check if user is already logged in
        if (Session::has('admin')) {
            return redirect('/dashboard');
        }
        else{
            // validate the input
            $req->validate([
                'email' => 'required|email|max:100',
                'password' => 'required|min:5'
            ]);
            // check if email and exist and match
            if($admin = Admin::where('email','=',$req->email)->first()){
                if(Hash::check($req->password,$admin->password)){
                    Session::put('admin',$admin);
                    return redirect('/dashboard');
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

    // dashboard functionality
    function dashboard(){
        // check if session exist
        if (Session::has('admin')) {
            $admin_name = Session::get('admin')['name'];
            return view('dashboard',['username'=>$admin_name]);
        }
        else{
            return redirect('/admin');
        }
    }

    // profile picture functionality
    function profile_picture(Request $req){
        $validate = $req->validate([
            'image'=>'required|image|max:2048|mimes:jpeg,jgp,png,gif,svg',
        ]);
        $imageName = time() . '.' . $req->image->extension();
        // insert the image path into the database
        $insert = new Admin;
        $insert->image = $imageName;
        $insert->save();
        // store the image in the public folder
        if($req->image->move(public_path('assets/images'))){
            return back()->with('success','Image uploaded successfully');
        }
    }
}
