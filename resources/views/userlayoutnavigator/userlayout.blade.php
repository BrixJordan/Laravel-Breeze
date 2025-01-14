@extends ('layouts.app')

@section('topbar')
<div class="w-full flex justify-center items-center bg-gray-500 text-white p-4 z-10">
    <ul class="flex space-x-8">
        <li><a href="{{route('dashboard')}}" class="block py-2 px-4 hover:bg-blue-500">Home</a></li>
        <li><a href="{{route('user.product')}}" class="block py-2 px-4 hover:bg-blue-500">Products</a></li>
        <li><a href="{{route('user.cart')}}" class="block py-2 px-4 hover:bg-blue-500">Cart</a></li>
        
        <li><a href="{{route('user.order')}}" class="block py-2 px-4 hover:bg-blue-500">My Orders</a></li>
        
        <li><a href="{{route('user.receipt')}}" class="block py-2 px-4 hover:bg-blue-500">Reciept</a></li>
    </ul>

</div>
@endsection

