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

        $userCpf = optional($this->route('user'))->cpf;

        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email' . ($userCpf ? ',' . $userCpf . ',cpf' : ''),
        'cpf' => 'required|string|size:11|unique:users,cpf' . ($userCpf ? ',' . $userCpf . ',cpf' : ''),
            'phone_number' => 'required|string|size:11',
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
            'cpf.size' => 'CPF deve conter exatamente :size dígitos!',
            'cpf.unique' => 'Este CPF já está cadastrado!',
    
            'phone_number.required' => 'Campo telefone é obrigatório!',
            'phone_number.string' => 'Telefone deve ser uma sequência de caracteres!',
            'phone_number.size' => 'Telefone deve ter exatamente :size dígitos!',
    
        
        ];
    }
}
