<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update(Request $request, $id)
{
    $request->validate([
        'product_name' =>  'required|string|max:255',
        'product_description' => 'required|string',
        'product_price' => 'required|numeric|min:0',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'product_stock' => 'required|integer|min:0',
        'product_status' => 'required|string|in:available,out_of_stock',
    ]);

   
    $product = Product::findOrFail($id);

    $product->product_name = $request->product_name;
    $product->product_description = $request->product_description;
    $product->product_price = $request->product_price;
    $product->product_stock = $request->product_stock;
    $product->product_status = $request->product_status;

    if ($request->hasFile('product_image')) {
        if ($product->product_image && \Storage::exists('public/' . $product->product_image)) {
            \Storage::delete('public/' . $product->product_image);
        }

        $product->product_image = $request->file('product_image')->store('product_images', 'public');
    }


    $product->save();

    return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $product = Product::findorFail($id);
        if($product->product_image && \Storage::exists('public/' . $product->product_image)){
            \Storage::delete('public/' . $product->product_image);
        }
        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
        //
    }

    public function updateStatus(Request $request, $id){
        $product= Product::findOrFail($id);
        $product->product_status = $product->product_status === 'availble' ? 'out_of_stock' : 'available';
        $product->save();

        return response()->json(['success' => true, 'status' =>$product->product_status]);
    }
}
