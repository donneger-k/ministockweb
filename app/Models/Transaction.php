<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

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
