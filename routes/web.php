<?php

use App\Enums\TransactionType;
use App\Http\Controllers\ProductControler;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/stock')->controller(ProductControler::class)->name('stock')->group(function () {
    Route::post('/search', 'searchProduct')->name('.searchProduct');

    Route::get('/', 'stock');

    Route::get('/add', 'addProduct')->name('.addProduct');
    Route::post('/add', 'storeProduct')->name('.storeProduct');

    Route::get('/edit/{product}', 'editProduct')->name('.editProduct');
    Route::patch('/edit/{product}', 'saveProduct')->name('.saveProduct');

    Route::get('/delete/{product}', 'confirmationDeleteProduct')->name('.confirmationDeleteProduct');
    Route::delete('/delete/{product}', 'deleteProduct')->name('.deleteProduct');

    Route::get('/{product}', 'showProduct')->name('.showProduct');
});

Route::prefix('/transaction')->controller(TransactionController::class)->name('transaction')->group(function () {
    Route::get('/', 'transaction');
});

Route::get('/credits', function () {
    return view('site.credits', ['back' => true]);
})->name('credits');


Route::get('/', function () {
    return view('site.welcome', ['back' => false]);
    #return Inertia::render('welcome');
})->name('home');
