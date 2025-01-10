<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function product(){
        return view('user.product');
    }

    public function cart(){
        return view('user.cart');
    }

    public function order(){
        return view('user.order');
    }

    public function receipt(){
        return view('user.receipt');
    }
}
