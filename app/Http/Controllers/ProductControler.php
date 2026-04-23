<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidator;
use App\Models\Produit;

class ProductControler extends Controller
{
    public function stock(){
        #dd(Produit::all());
        return view('stock.stock', [
            'products' => Produit::paginate(6)
        ]);
    }

    public function showProduct(Produit $product){
        return view('stock.product', [
            'product' => $product
        ]);
    }

    public function addProduct(){
        $product = new Produit();
        return view('stock.addproduct', [
            'product' => $product
        ]);
    }

    public function storeProduct(ProductValidator $request){
        Produit::create($request->validated());
        return redirect()->route('stock')->with('success', 'Produit ajouté');
    }

}
