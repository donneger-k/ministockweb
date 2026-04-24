<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchValidator extends FormRequest
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
            'ref' => ['numeric'],
            'prix' => ['numeric'],
            'name' => ['string', 'max:255'],
            'categorie' => ['string', 'max:255'],
        ];

        return [
            'filter' => ['required', Rule::in(['ref', 'nom', 'prix', 'categorie'])],
            'search' => array_merge(['required'], $filterRules[$this->filter] ?? ['string']),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'filter' => trim($this->filter),
        ]);
    }
}
