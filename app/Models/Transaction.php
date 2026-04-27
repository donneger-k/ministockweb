<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TransactionType;

class Transaction extends Model
{
    protected $fillable = [
        'nom',
        'commentaire',
        'quantite',
        'nom_produit',
        'type',
        'produit_id'
    ];

    protected $casts = [
        'type' => TransactionType::class,
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
