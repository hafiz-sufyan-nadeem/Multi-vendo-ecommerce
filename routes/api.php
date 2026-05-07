<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return \App\Models\Product::with('category')->get();
});

