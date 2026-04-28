<?php

namespace App\Http\Requests;

use App\Enums\TransactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchTransactionValidator extends FormRequest
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
        $filterRules = [
            'nom' => ['string'],
            'created_at' => ['date'],
            'nom_produit' => ['string', 'max:255'],
            'type' => ['string', Rule::in(TransactionType::cases())],
        ];

        return [
            'filter' => ['required', Rule::in(['nom', 'created_at', 'nom_produit', 'type'])],
            'search' => array_merge(['required'], $filterRules[$this->filter] ?? ['string']),
        ];
    }
}
