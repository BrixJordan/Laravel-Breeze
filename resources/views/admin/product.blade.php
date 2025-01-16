@extends('adminlayoutnavigator.adminlayout')

@section('content')
@if(session('success') || isset($success))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') ?? $success }}
        </div>
    @endif
<button class="px-4 py-4 bg-red-500 text-white rounded hover:bg-red-600" id="openModal">Add Product</button>
@include('adminModals.add_product_modal')

<div class="overflow-x-auto">
    <h2 class="text-lg font-bold">Product List</h2>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr >
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">ID</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">NAME</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">DESCRIPTION</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">PRICE</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">IMAGE</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">STOCK</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">STATUS</th>
                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
    <tr>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">{{ $product->id }}</td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">{{ $product->product_name }}</td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">{{ $product->product_description }}</td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">{{ $product->product_price }}</td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="w-16 h-16 object-cover">
        </td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">{{ $product->product_stock}}</td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600"><button 
        class="px-2 py-1 rounded {{$product->product_status == 'available' ? 'bg-green-500' : 'bg-gray-500' }} text-white toggleStatusButton"
        data-product-id="{{$product->id}}"
        data-status="{{$product->product_status}}">{{ucfirst($product->product_status)}}</button></td>
        <td class="py-2 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600">
            <button class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600 openEditModalButton" data-product-id="{{ $product->id }}">Edit</button>
            @include('adminModals.edit_product_modal')
            <!-- delete button -->
              <form action="{{route('product.destroy', $product->id)}}" method="post" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
              </form>
        </td>
    </tr>
    @endforeach
</tbody>
    </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggleStatusButton').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.dataset.productId;
                const currentStatus = this.dataset.status;

                fetch(`/product/update-status/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ status: currentStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                        this.dataset.status = data.status;
                        this.className = `px-2 py-1 rounded ${
                            data.status === 'available' ? 'bg-green-500' : 'bg-gray-500'
                        } text-white toggleStatusButton`;
                    }
                });
            });
        });
    });
</script>



@endsection