<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function inventory()
    {
        return view('admin.inventory');
    }

    public function product()
    {
        return view('admin.product');

    }

    public function order()
    {
        return view('admin.order');
    }

    public function sale()
    {
        return view('admin.sale');
    }

    public function customer()
    {
        return view('admin.customer');
    }
    //
}
