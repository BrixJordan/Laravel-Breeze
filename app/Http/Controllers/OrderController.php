<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;


class OrderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'address' => 'required',
        'contact' => 'required',
        'payment_method' => 'required',
    ]);

    $cart = session('cart', []);
    
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    $total_amount = collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']);

    $order = Order::create([
        'user_id' => auth()->id(),
        'address' => $request->address,
        'contact_number' => $request->contact,
        'mode_of_payment' => $request->payment_method,
        'total_amount' => $total_amount,
        'order_details' => json_encode($cart),
    ]);

    foreach ($cart as $productId => $item) {
        $product = Product::find($productId);
        if ($product && $product->product_stock >= $item['quantity']) {
            $product->decrement('product_stock', $item['quantity']);
        } else {
            return redirect()->back()->with('error', "Insufficient stock for product: {$product->product_name}");
        }
    }

    session()->forget('cart');

    return redirect()->route('user.order')->with('success', 'Order placed successfully!');
}


    //
}
