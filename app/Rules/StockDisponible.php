<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use App\Models\Produit;

class StockDisponible implements ValidationRule
{
    protected $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Produit::find($this->productId);

        if (!$product) {
            $fail("Produit introuvable.");
            return;
        }

        if ($value > $product->quantite) {
            $fail("Stock insuffisant (disponible : {$product->quantite}).");
        }
    }
}
