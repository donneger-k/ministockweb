<?php

use App\Http\Controllers\ProductControler;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/stock')->controller(ProductControler::class)->name('stock')->group(function () {
    Route::get('/', 'stock');

    Route::get('/{product}', 'showProduct')->name('.showProduct');
});


Route::get('/', function () {
    return view('base');
    #return Inertia::render('welcome');
})->name('home');
