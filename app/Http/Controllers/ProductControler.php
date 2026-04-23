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

    public function editProduct(Produit $product){
        return view('stock.editproduct', [
            'product' => $product
        ]);
    }

    public function saveProduct(ProductValidator $request, Produit $product){
        $product->update($request->validated());
        return redirect()->route('stock')->with('success', 'Produit modifié');
    }

    public function confirmationDeleteProduct(Produit $product){
        return view('stock.confirmationdeleteproduct', [
            'product' => $product
        ]);
    }

    public function deleteProduct(Produit $product){
        $product->delete();
        return redirect()->route('stock')->with('success', 'Produit supprimé');
    }

}
