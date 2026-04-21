<?php

namespace App\Models;

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

    public function is_critique(){
        return $this->quantite <= $this->quantite_critique;
    }
}
