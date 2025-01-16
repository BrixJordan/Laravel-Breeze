@extends('adminlayoutnavigator.adminlayout')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Orders List</h2>

        <!-- Display success or error message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 mb-4 rounded-md">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="bg-red-500 text-white p-3 mb-4 rounded-md">{{ session('error') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">ID</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">User Name</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Address</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Contact Number</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Payment Method</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Total Amount</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Order Details</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->id }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->user->name ?? 'N/A' }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->address }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->contact_number }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->mode_of_payment }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $order->order_details }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-700">
    @if($order->status === 'pending')
        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                Out For Delivery
            </button>
        </form>
    @else
        {{ $order->status }}
    @endif
</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
