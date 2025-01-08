<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])->name('product');
    Route::get('inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('sale', [AdminController::class, 'sale'])->name('sale');
    Route::get('customer', [AdminController::class, 'customer'])->name('customer');
});

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


require __DIR__.'/auth.php';
