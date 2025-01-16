@extends('userlayoutnavigator.userlayout')

@section('usercontent')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">My Orders</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md">{{ session('success') }}</div>
    @endif


    <div class="hidden lg:block">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Order ID</th>
                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Date</th>
                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Items</th>
                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Total</th>
                    <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody>
    @foreach($orders as $order)
        <tr class="hover:bg-gray-100">
            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->id }}</td>
            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->created_at->format('M d, Y') }}</td>
            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->order_details }}</td>
            <td class="py-2 px-4 border-b text-sm text-gray-700">₱{{ number_format($order->total_amount, 2) }}</td>
            <td class="py-2 px-4 border-b text-sm text-gray-700">
                @if($order->status === 'Out for Delivery')
                <form action="{{route('orders.userReceived', $order->id)}}" method="post">
                    @csrf 
                    @method('PATCH')
                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Received</button>
                </form>
                @elseif($order->status === 'pending')
                <span class="px-3 py-1 text-white text-sm rounded bg-yellow-500">
                    {{$order->status}}
                </span>
                @elseif($order->status === 'Out for Delivery')
                <span class="px-3 py-1 text-white text-sm rounded bg-blue-500">
                    {{$order->status}}
                </span>
                @else
                <span class="px-3 py-1 text-white text-sm rounded bg-gray-500">
                    {{$order->status}}
                </span>
                @endif

            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>


    <div class="lg:hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($orders as $order)
                <div class="border rounded-lg p-4 bg-white shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">Order #{{ $order->id }}</h3>
                    <p class="text-gray-600 text-sm">Date: {{ $order->created_at->format('M d, Y') }}</p>
                    <p class="mt-2"><strong>Items:</strong> {{ $order->order_details }}</p>
                    <p class="mt-2"><strong>Total:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
                    <p class="mt-2">
                        <span class="px-3 py-1 text-white text-sm rounded 
                            @if($order->status == 'pending') bg-yellow-500
                            @elseif($order->status == 'Out for Delivery') bg-blue-500
                            @elseif($order->status == 'Delivered') bg-green-500
                            @else bg-gray-500 @endif">
                            {{ $order->status }}
                        </span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
