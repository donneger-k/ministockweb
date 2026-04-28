<?php

use App\Enums\TransactionType;
use App\Http\Controllers\ProductControler;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/stock')->controller(ProductControler::class)->name('stock')->group(function () {
    Route::get('/search', 'searchProduct')->name('.searchProduct');

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
    Route::get('/search', 'searchTransaction')->name('.searchTransaction');

    Route::get('/', 'transaction');

    Route::get('/add', 'addTransaction')->name('.addTransaction');
    Route::post('/add', 'storeTransaction')->name('.storeTransaction');

    Route::get('/{transaction}', 'showTransaction')->name('.showTransaction');
});

Route::get('/credits', function () {
    return view('site.credits', ['back' => true]);
})->name('credits');

Route::get('products/search', [ProductControler::class, 'searchProductGet'])->name('products.search');

Route::get('/', function () {
    return view('site.welcome', ['back' => false]);
    #return Inertia::render('welcome');
})->name('home');
