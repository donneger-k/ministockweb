<?php

namespace App\Services;

use App\Models\Produit;
use App\Models\Transaction;

class DashboardService{

    public function getStats(){
        return [
            'criticalProducts' => Produit::where('quantite', '<=', 'quantite_critique')->count(),
            'outOfStockProducts' => Produit::where('quantite', '=', 0)->count(),
            'totalProducts' => Produit::count(),
            'listOfCriticalProducts' => Produit::whereColumn('quantite', '<=', 'quantite_critique')->where('quantite', '>', 0)->get(),
            'listOfOutOfStockProducts' => Produit::where('quantite', '=', 0)->get(),
            'listOfTransactions' => $this->getListOfTransactions(),
            'detailsTransactionOfTheMonth' => $this->getDetailsTransactionOfTheMonth(),
            'totalTransactions' => Transaction::count(),
        ];
    }

    private function getListOfTransactions(){
        $transactionsPerMonth = Transaction::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
                                    ->where('created_at', '>=', now()->subMonths(5))
                                    ->groupBy('month')
                                    ->orderBy('month')
                                    ->pluck('count', 'month');
        $months = $transactionsPerMonth->keys()->map(function ($month) {
                        return \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y');
                    });
        $counts = $transactionsPerMonth->values();
        return compact('months', 'counts');
    }

    private function getDetailsTransactionOfTheMonth(){
        $transactionsByType = Transaction::selectRaw('type, COUNT(*) as count')->groupBy('type')->get();
        $labels = [];
        $data = [];
        $colors = [];
        foreach ($transactionsByType as $t) {
            $labels[] = $t->type->label();
            $data[] = $t->count;
            $colors[] = $t->type->color();
        }
        return compact('labels', 'data', 'colors');
    }


}