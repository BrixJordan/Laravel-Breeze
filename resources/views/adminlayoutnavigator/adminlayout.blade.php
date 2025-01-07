@extends ('layouts.app')

@section('sidebar')
<div class="w-60 bg-gray-800 text-white h-screen p-4">
    <ul>
        <li><a href="{{route('admin.dashboard')}}" class="block py-2 px-4 hover:bg-blue-600">Home</a></li>
        <li><a href="{{route('admin.product')}}" class="block py-2 px-4 hover:bg-blue-600 ">Products</a></li>
        <li><a href="{{route('admin.sale')}}" class="block py-2 px-4 hover:bg-blue-600 ">Sales</a></li>
        <li><a href="{{route('admin.inventory')}}" class="block py-2 px-4 hover:bg-blue-600 ">Inventory</a></li>
        <li><a href="{{route('admin.customer')}}" class="block py-2 px-4 hover:bg-blue-600 ">Customers</a></li>
    </ul>
</div>
@endsection

@section('content')
<h1>Welcome to Admindashboard</h1>
@endsection