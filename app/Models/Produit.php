<?php

namespace App\Models;

use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProduit
 */
class Produit extends Model
{
    protected $fillable = [
        'ref',
        'nom',
        'categorie',
        'prix',
        'quantite',
        'quantite_critique',
    ];

    public function is_critical(){
        return $this->quantite <= $this->quantite_critique;
    }

    public function in_stock(){
        return $this->quantite > 0;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function updateStock(int $quantite, TransactionType $type){
        if ($type->isEntree()) {
            $this->quantite += $quantite;
        }
        else {
            $this->quantite -= $quantite;
        }
        $this->save();
    }

}
