<?php

use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products');
});

Route::get('products', Products::class)->name('products');
