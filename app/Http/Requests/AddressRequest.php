<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'street'       => 'required|string|max:150',
            'number'       => 'required|string|max:5',
            'district'     => 'required|string|max:70',
            'city'         => 'required|string|max:70',
            'state'        => 'required|string|size:2|exists:states,uf',
            'zip_code'     => 'required|string|size:8',
        ];
    }

    public function messages(): array
    {
        return[
           
            'street.required' => 'Campo rua é obrigatório!',
            'street.string' => 'Rua deve ser um texto!',
            'street.max' => 'Rua deve ter no máximo 150 caracteres!',
    
            'number.required' => 'Campo número é obrigatório!',
            'number.string' => 'Número deve ser um texto!',
            'number.max' => 'Número deve ter no máximo 5 caracteres!',
    
            'district.required' => 'Campo bairro é obrigatório!',
            'district.string' => 'Bairro deve ser um texto!',
            'district.max' => 'Bairro deve ter no máximo 70 caracteres!',
    
            'city.required' => 'Campo cidade é obrigatório!',
            'city.string' => 'Cidade deve ser um texto!',
            'city.max' => 'Cidade deve ter no máximo 70 caracteres!',
    
            'state.required' => 'Campo UF é obrigatório!',
            'state.string' => 'UF deve ser um texto!',
            'state.size' => 'UF deve conter exatamente 2 letras!',
            'state.exists' => 'UF inválida! Selecione uma UF existente!',

    
            'zip_code.required' => 'Campo CEP é obrigatório!',
            'zip_code.string' => 'CEP deve ser um texto!',
            'zip_code.size' => 'CEP deve conter exatamente :size dígitos!',
        
        ];
    }
}
