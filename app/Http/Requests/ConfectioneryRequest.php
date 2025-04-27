<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfectioneryRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'cep' => 'required|regex:/^\d{5}-?\d{3}$/',
            'road' => 'required|string',
            'number' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'telephone' => 'required|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }
}
