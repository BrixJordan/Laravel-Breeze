@extends('userlayoutnavigator.userlayout')

@section('usercontent')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">My Cart</h2>

    @if(session('cart') && count(session('cart')) > 0)
    <form action="{{ route('cart.update') }}" method="post">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(session('cart') as $id => $details)
            <div class="border rounded-lg p-4 bg-white shadow hover:shadow-lg">
                <input type="checkbox" name="selected_products[]" value="{{ $id }}" class="mb-2">
                <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="w-full h-48 object-cover rounded-md">
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">{{ $details['name'] }}</h3>
                    <p class="text-green-600 font-bold mt-2">₱{{ number_format($details['price'], 2) }}</p>
                    <label for="quantity_{{ $id }}" class="block text-gray-600 mt-2">Quantity:</label>
                    <input type="number" name="quantities[{{ $id }}]" id="quantity_{{ $id }}" value="{{ $details['quantity'] }}" min="1" class="w-16 border rounded px-2 py-1">
                    <p class="text-gray-700 mt-1">Total: ₱{{ number_format($details['quantity'] * $details['price'], 2) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Update Cart
        </button>
        <button formaction="{{route('cart.checkout')}}" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 ml-4">
            Proceed to Checkout
        </button>
    </div>
</form>

    @else
        <p class="text-gray-600">Your cart is empty.</p>
    @endif
</div>
@endsection
