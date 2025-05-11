<?php

use App\Livewire\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products');
});

Route::get('products', Product::class)->name('products');
