<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $userId = $this->route('user');

        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'. $this->route('user') . ',cpf',
            'cpf' => 'required|string|size:11|unique:users,cpf,' . $this->route('user') . ',cpf',
            'phone_number' => 'required|string|max:11',
            'street'       => 'required|string|max:150',
            'number'       => 'required|string|max:5',
            'district'     => 'required|string|max:70',
            'city'         => 'required|string|max:70',
            'state'        => 'required|string|size:2',
            'zip_code'     => 'required|string|size:8',
        ];
    }

    public function messages(): array
    {
        return[
           
            'name.required' => 'Campo nome é obrigatório!',
            'name.min' => 'Nome com no mínimo :min caracteres!',
            
            'email.required' => 'Campo e-mail é obrigatório!',
            'email.email' => 'Necessário enviar e-mail válido!',
            'email.unique' => 'O e-mail já está cadastrado!',

            'cpf.required' => 'Campo CPF é obrigatório!',
            'cpf.string' => 'CPF deve ser uma sequência de números!',
            'cpf.size' => 'CPF deve conter exatamente 11 dígitos!',
            'cpf.unique' => 'Este CPF já está cadastrado!',
    
            'phone_number.required' => 'Campo telefone é obrigatório!',
            'phone_number.string' => 'Telefone deve ser uma sequência de caracteres!',
            'phone_number.max' => 'Telefone deve ter no máximo 11 dígitos!',
    
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
    
            'zip_code.required' => 'Campo CEP é obrigatório!',
            'zip_code.string' => 'CEP deve ser um texto!',
            'zip_code.size' => 'CEP deve conter exatamente 8 dígitos!',
        
        ];
    }
}
