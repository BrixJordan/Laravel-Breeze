@extends('adminlayoutnavigator.adminlayout')

@section('content')
<button class="px-4 py-4 bg-red-500 text-white rounded hover:bg-red-600" id="openModal">Add Product</button>
@include('adminModals.add_product_modal')
    
@endsection