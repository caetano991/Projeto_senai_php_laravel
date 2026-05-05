<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' =>'required|email|unique:users,email', 
            'password' => 'required|confirmed|min:6',
        ];
    }
    
    public function messages()
    {
        return[
        'name.required' => 'Campo obrigatório',
        'email.required' => 'Campo de e-mail Obrigatório',
        'email.email' => 'Insira o válido. Ex: example@site.com',
        'email.unique' => 'O email já foi cadastrado.',
        'password.required' => 'Campo senha é obrigatório',
        'password.confirmed' => 'As senhas não são iguais!',
        'password.min' => 'Senha com no minimo :min caracteres',
        ];
    }
}
