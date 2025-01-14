<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'address' => 'required',
        'contact' => 'required',
        'payment_method' => 'required'
    ]);

    // Store the order
    $order = Order::create([
        'user_id' => auth()->id(),
        'address' => $request->address,
        'contact_number' => $request->contact,
        'mode_of_payment' => $request->payment_method,
        'order_details' => json_encode(session('cart', [])),
    ]);

    // Clear the cart
    session()->forget('cart');

    return redirect()->route('user.order')->with('success', 'Order placed successfully!');
}

    //
}
