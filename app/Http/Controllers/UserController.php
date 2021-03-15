<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // register functionality
    function register(Request $req){
        return $req->input();
    }
}
