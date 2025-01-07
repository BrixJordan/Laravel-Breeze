@extends('adminlayoutnavigator.adminlayout')

@section('content')
<button class="px-4 py-4 bg-red-500 text-white rounded hover:bg-red-600" id="openModal">Add Product</button>
@if(session('success') || isset($success))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') ?? $success }}
        </div>
    @endif
@include('adminModals.add_product_modal')

<div class="mt-8">
    <h2 class="text-lg font-bold">Product List</h2>
    <div class="overflow-x-auto">
    <table class="min-w-full mt-4 border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">NAME</th>
                <th class="p-2 border">DESCRIPTION</th>
                <th class="p-2 border">PRICE</th>
                <th class="p-2 border">IMAGE</th>
                <th class="p-2 border">STOCK</th>
                <th class="p-2 border">STATUS</th>
                <th class="p-2 border">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
    <tr>
        <td class="p-2 border">{{ $product->id }}</td>
        <td class="p-2 border">{{ $product->product_name }}</td>
        <td class="p-2 border">{{ $product->product_description }}</td>
        <td class="p-2 border">{{ $product->product_price }}</td>
        <td class="p-2 border">
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="w-16 h-16 object-cover">
        </td>
        <td class="p-2 border">{{ $product->product_stock}}</td>
        <td class="p-2 border">{{ $product->product_status }}</td>
    </tr>
    @endforeach
    
</tbody>

    </table>
    </div>
</div>


    
@endsection