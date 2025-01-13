@extends('userlayoutnavigator.userlayout')

@section('usercontent')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Order Details -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Order Details</h3>
            @foreach($checkoutItems as $item)
                <div class="border rounded-lg p-4 bg-white shadow mb-4">
                    <h4 class="text-lg font-semibold">{{ $item['name'] }}</h4>
                    <p>Quantity: {{ $item['quantity'] }}</p>
                    <p>Price: ₱{{ number_format($item['price'], 2) }}</p>
                    <p>Total: ₱{{ number_format($item['quantity'] * $item['price'], 2) }}</p>
                </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Order Summary</h3>
            <p class="text-gray-700">Total Price: ₱{{ number_format(collect($checkoutItems)->sum(fn($item) => $item['quantity'] * $item['price']), 2) }}</p>
            
            <!-- Address and Contact -->
            <form action="#" method="post" class="mt-4">
                @csrf
                <label for="address" class="block text-gray-600">Address:</label>
                <input type="text" name="address" id="address" required class="w-full border rounded px-3 py-2 mb-4">

                <label for="contact" class="block text-gray-600">Contact Number:</label>
                <input type="text" name="contact" id="contact" required class="w-full border rounded px-3 py-2 mb-4">

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Confirm Checkout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
