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
            'ref' => ['required', 'numeric', Rule::unique('produits', 'ref')->ignore($this->route('product')->id)],
            'nom' => ['required', 'string'],
            'categorie' => ['required', 'string'],
            'prix' => ['required', 'numeric'],
            'quantite' => ['required', 'numeric'],
            'quantite_critique' => ['required', 'numeric'],
        ];
    }
}
