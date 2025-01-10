
@extends('userlayoutnavigator.userlayout')
@section('usercontent')

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Responsive image with max width and auto height -->
    <img src="{{ asset('images/bg1.png') }}" 
         alt="background image" 
         class="w-full max-w-screen-md h-auto object-cover rounded-lg shadow-lg mx-auto">
</div>

    <br>

    <div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Our Products</h2>

    <!-- Grid layout for cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p1.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Zero Sugar OREO™ Limited Edition</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">Introducing the new Coca‑Cola® Zero Sugar OREO™ Limited Edition Creations®, a delicious duo that celebrates friendship with every sip...</p>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p2.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Original</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">Enjoy the crisp and refreshing taste of Coca‑Cola Original...</p>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p3.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Mexico</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">Single bottle of Coca‑Cola Original Taste—the refreshing, crisp taste you know and love...</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p4.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Y3000</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">New from Coca‑Cola Creations, look into the year 3000 with Coca‑Cola Y3000 – the first limited-edition Coke flavor from the future. Created to show us an optimistic vision of what’s to come, where humanity and technology are more connected than ever...</p>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p5.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Happy Tears Zero Sugar</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">Introducing Coca‑Cola Happy Tears Zero Sugar – the newest Coca‑Cola Creation that captures the taste of #HappyTears and the Real Magic of those joyful moments spent spreading kindness...</p>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('images/p6.jpg') }}" alt="" class="w-full h-48 object-contain mx-auto">
    <div class="p-4">
        <h3 class="text-lg font-semibold">Coca‑Cola® Caffeine Free</h3>
        <h2 class="text-lg font-semibold">Price:</h2>
        <p class="text-gray-600">Enjoy the crisp and refreshing taste of Coca‑Cola Original with no caffeine....</p>
    </div>
</div>
<br>
<br>
<button ><a href="{{route('user.product')}}" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-blue-400">view all Products</a></button>



</div>




@endsection


