<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'value' => 'required|numeric|min:0.01',
            'description' => 'required|string|min:10',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'cconfectioneries_id' => 'required|exists:confectioneries,id',
        ];
    }
}
