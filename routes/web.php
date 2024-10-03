<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Routes that require authentication and verification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for authenticated users only
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Categories routes
    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'view'])->name('categories.view');
    Route::get('categories/create', [App\Http\Controllers\CategoryController::class, 'create']);
    Route::post('categories/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category_id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category_id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category_id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{category_id}/products', [App\Http\Controllers\CategoryController::class, 'showProducts'])->name('categories.products');

    // Products routes
    Route::get('products', [App\Http\Controllers\ProductController::class, 'view']);
    Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
