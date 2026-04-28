<?php

namespace App\Http\Requests;

use App\Enums\TransactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\StockDisponible;

class TransactionValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'commentaire' => ['string', 'max:255', 'nullable'],
            'quantite' => ['required', 'integer', 'min:1', new StockDisponible($this->produit_id)],
            'nom_produit' => ['required', 'string', Rule::exists('produits', 'nom')],
            'type' => ['required', Rule::in(TransactionType::cases())],
            'produit_id' => ['required', Rule::exists('produits', 'id')]
        ];
    }
}
