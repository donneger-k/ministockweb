<?php

use App\Http\Controllers\ProductControler;
use App\Models\Produit;
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

Route::get('/credits', function () {
    return view('site.credits');
})->name('credits');


Route::get('/', function () {
    /*
    Produit::create([
        'ref' => 102,
        'nom' => 'Produit 4',
        'categorie' => 'Catégorie 3',
        'prix' => 3,
        'quantite' => 3,
        'quantite_critique' => 0,
    ]);*/

    return view('site.welcome', ['back' => false]);
    #return Inertia::render('welcome');
})->name('home');
