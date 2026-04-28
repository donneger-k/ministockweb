<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductValidator extends FormRequest
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
            'ref' => ['required', 'string', Rule::unique('produits', 'ref')->ignore($this->route('product')?->id)],
            'nom' => ['required', 'string'],
            'categorie' => ['required', 'string'],
            'prix' => ['required', 'numeric'],
            'quantite' => ['required', 'numeric', 'min:0',
            function ($attribute, $value, $fail) {
                if ($this->route('produit') && $value != $this->route('produit')->quantite) {
                    $fail('La quantité ne peut pas être modifiée directement.');
                }
            },],
            'quantite_critique' => ['required', 'numeric', 'min:0'],
        ];
    }
}
