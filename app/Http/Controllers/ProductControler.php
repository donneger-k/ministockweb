<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProductControler extends Controller
{
    public function stock(){
        #dd(Produit::all());
        return view('stock.stock', [
            'products' => Produit::all()
        ]);
    }
}
