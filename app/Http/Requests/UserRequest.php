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

     // Obtém o usuário da rota (será null no cadastro e preenchido na edição)
        $userId = $this->route('user');

        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.($userId ? $userId->Id:null),
            'password'=>'required|confirmed|min:6', //minimo 6 caracteres
            'roles'=>'required',
        ];
    }
    
   public function messages(){
        return[
            'name.required'=>'Campo nome obrigatório!',
            'email.required'=>'Campo e-mail obrigatório!',
            'email.email'=>'Insira e-mail válido! Ex: example@site.com',
            'email.unique'=>'E-mail já cadastrado para outro usuário!',
            'password.required'=>'Campo senha obrigatório!',
            'password.confirmed'=>'As senhas não conferem!',
            'password.min'=>'A senha deve conter no mínimo :min caracteres!',
            'roles.required'=>'Campo papel obrigatório!',
        ];
    }
}
