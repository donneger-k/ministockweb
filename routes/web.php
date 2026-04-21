<?php

use App\Http\Controllers\ProductControler;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/stock')->controller(ProductControler::class)->group(function () {
    Route::get('/', 'stock')->name('stock');
});


Route::get('/', function () {
    return view('base');
    #return Inertia::render('welcome');
});
