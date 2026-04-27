<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('transaction.transaction', [
            'transactions' => Transaction::paginate(10),
            'back' => false
        ]);
    }
}
