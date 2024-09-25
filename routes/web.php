<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('categories',[App\Http\Controllers\CategoryController::class,'view']);
Route::get('categories/{category_id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('categories/{category_id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/create',[App\Http\Controllers\CategoryController::class,'create']);
Route::post('categories/create',[App\Http\Controllers\CategoryController::class,'store']);

Route::put('categories/{category_id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');


Route::get('products',[App\Http\Controllers\ProductController::class,'view']);
Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
Route::get('products/create',[App\Http\Controllers\ProductController::class,'create']);
Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

Route::put('products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');


Route::get('/categories/{category_id}/products', [App\Http\Controllers\CategoryController::class, 'showProducts'])->name('categories.products');

require __DIR__.'/auth.php';
