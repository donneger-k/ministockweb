<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Produit;
use App\Http\Requests\TransactionValidator;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('transaction.transaction', [
            'transactions' => Transaction::paginate(10),
            'back' => false
        ]);
    }

    public function addTransaction()
    {
        return view('transaction.addtransaction', [
            'transaction' => new Transaction(),
            'products' => Produit::all(),
            'back' => true
        ]);
    }

    public function storeTransaction(TransactionValidator $request){
        Transaction::create($request->validated());
        return redirect()->route('transaction')->with('success', 'Transaction ajoutée');
    }

}
