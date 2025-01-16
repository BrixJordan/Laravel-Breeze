<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;


class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->paginate(10); 
        return view('admin.order', compact('orders'));
    }

    public function userOrders(){
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        
        return view('user.order', compact('orders'));
    }
    
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

  
    $order_details = collect($cart)->map(function ($item) {
        return $item['name'];  
    })->implode(', '); 

    $order = Order::create([
        'user_id' => auth()->id(),
        'address' => $request->address,
        'contact_number' => $request->contact,
        'mode_of_payment' => $request->payment_method,
        'total_amount' => $total_amount,
        'order_details' => $order_details, 
        'status' => 'pending',
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

public function markOutForDelivery(Order $order)
{
    $order->update(['status' => 'Out for Delivery']);

    return redirect()->back()->with('success', 'Order Marked as Out For Delivery');
}

public function updateOrderStatus($id)
{
    $order = Order::find($id);
    if($order){
        $order->status = 'Out for Delivery';
        $order->save();

        return redirect()->back()->with('success', 'Order Status Updated!');
    }

    return redirect()->back()->with('error', 'Order not found!');
}

public function userMarkAsReceived($orderId)
{
    $order = Order::findOrFail($orderId);
    if($order->status === 'Out for Delivery'){
        $order->status = 'Delivered';
        $order->save();

        return redirect()->back()->with('success', 'Order marked as received');
    }
    return redirect()->back()->with('error', 'invalid!');
}



    //
}
