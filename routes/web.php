<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//admin navigation routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])->name('product');
    Route::get('inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('sale', [AdminController::class, 'sale'])->name('sale');
    Route::get('customer', [AdminController::class, 'customer'])->name('customer');
    Route::get('order', [AdminController::class, 'order'])->name('order');
});

//User navigation routes
Route::get('product', [UserController::class, 'product'])->name('user.product');
Route::get('cart', [UserController::class, 'cart'])->name('user.cart');
Route::get('checkout', [UserController::class, 'checkout'])->name('user.checkout');
Route::get('order', [UserController::class, 'order'])->name('user.order');
Route::get('receipt', [UserController::class, 'receipt'])->name('user.receipt');

//display ng product sa users
Route::get('product', [ProductController::class, 'showProduct'])->name('user.product');



//add to cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
//update cart
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
//checkout
Route::post('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('checkout', [OrderController::class, 'store'])->name('checkout.store');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Products
Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/update-status/{id}', [ProductController::class, 'updateStatus'])->name('product.updateStatus');

//orders admin side
Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');

//orders user side
Route::get('/user/order', [OrderController::class, 'userOrders'])->name('user.order');

//status for order
Route::patch('/orders/{order}/out-for-delivery', [OrderController::class, 'markOutForDelivery'])->name('orders.outForDelivery');

//status for order
Route::patch('/order/{id}/status', [OrderController::class, 'updateOrderStatus'])->name('orders.updateStatus');

//status for order in user
Route::patch('orders/{order}/mark-as-received', [OrderController::class, 'userMarkAsReceived'])->name('orders.userReceived');





require __DIR__.'/auth.php';
