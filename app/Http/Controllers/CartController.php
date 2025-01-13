<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        }else{
            $cart[$product->id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->product_price,
                "image" => $product->product_image
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $quantity){
            if(isset($cart[$id])){
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function checkout(Request $request){
        $selectedProducts = $request->input('selected_products', []);
        $cart = session()->get('cart', []);

        $checkoutItems = [];
        foreach ($selectedProducts as $productId){
            if(isset($cart[$productId])){
                $checkoutItems[$productId] = $cart[$productId];
            }
        }

        return view('user.checkout', compact('checkoutItems'));

    }
}
