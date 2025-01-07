<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'product_name' =>  'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_stock' => 'required|integer|min:0',
            'product_status' => 'required|string|in:available,out_of_stock',

        ]);

        $imagepath = $request->file('product_image')->store('product_images', 'public');

        Product::create([
            'product_name' => $validated['product_name'],
            'product_description' => $validated['product_description'],
            'product_price' => $validated['product_price'],
            'product_image' => $imagepath,
            'product_stock' => $validated['product_stock'],
            'product_status' => $validated['product_status'],
        ]);

        return redirect()->route('admin.product')->with('success', 'Product added successfully!');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
