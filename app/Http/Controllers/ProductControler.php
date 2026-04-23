<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
