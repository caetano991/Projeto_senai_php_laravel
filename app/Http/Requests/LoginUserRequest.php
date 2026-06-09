<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|',
        ];
    }   

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve conter um endereço de e-mail válido.',
            'email.unique' => 'O e-mail já está em uso. Por favor, escolha outro.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres.',
        ];
    }
}
