<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidator;
use App\Http\Requests\SearchValidator;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProductControler extends Controller
{
    public function stock(){
        #dd(Produit::all());
        return view('stock.stock', [
            'products' => Produit::paginate(6),
            'back' => false
        ]);
    }

    public function showProduct(Produit $product){
        return view('stock.product', [
            'product' => $product,
            'back' => true
        ]);
    }

    public function addProduct(){
        $product = new Produit();
        return view('stock.addproduct', [
            'product' => $product,
            'back' => true
        ]);
    }

    public function storeProduct(ProductValidator $request){
        Produit::create($request->validated());
        return redirect()->route('stock')->with('success', 'Produit ajouté');
    }

    public function editProduct(Produit $product){
        return view('stock.editproduct', [
            'product' => $product,
            'back' => true
        ]);
    }

    public function saveProduct(ProductValidator $request, Produit $product){
        $product->update($request->validated());
        return redirect()->route('stock')->with('success', 'Produit modifié');
    }

    public function confirmationDeleteProduct(Produit $product){
        return view('stock.confirmationdeleteproduct', [
            'product' => $product,
            'back' => false
        ]);
    }

    public function deleteProduct(Produit $product){
        $product->delete();
        return redirect()->route('stock')->with('success', 'Produit supprimé');
    }

    public function searchProduct(SearchValidator $request){
        $donnes = $request->all();
        $products = Produit::where($donnes['filter'], 'like', '%'.$donnes['search'].'%')->paginate(6);
        return view('stock.stock', ['products' => $products, 'back' => false]);
    }

    public function searchProductGet(Request $request)
    {
        $search = $request->get('q');
        $filter = $request->get('filter');
        $products = Produit::where($filter, 'like', "%{$search}%")->limit(10)->get();
        return response()->json($products);
    }

}
