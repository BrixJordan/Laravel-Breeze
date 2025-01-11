@extends('userlayoutnavigator.userlayout')

@section('usercontent')

@if(session('success') || isset($success))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') ?? $success }}
        </div>
    @endif
    
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Our Products</h2>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-contain mx-auto">
                
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $product->product_name }}</h3>
                    <p class="text-gray-700 mt-2">{{ $product->product_description }}</p>
                    <p class="text-green-600 font-bold mt-2">₱{{ number_format($product->product_price, 2) }}</p>
                </div>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf 
                    <input type="hidden"
                    name="product_id"
                    value="{{$product->id}}">
                    <button type="submit" class= " bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add to Cart</button>
                </form>
            </div>
            
                
            
        @endforeach
    </div>
</div>
@endsection
