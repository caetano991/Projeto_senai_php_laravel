<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'course_id'   => 'required|exists:courses,id',
        'name'        => 'required|string|max:255',
        'description' => 'required',
    ];
}

    //Traduzir as mensagens de Validação do formulário
    public function messages(): array
    {
        return[
            'course_id.required' => 'Necessário enviar o id do curso!',
            'name.required' => 'Campo nome da aula é obrigatório!',
            'description.required' => 'Campo descrição é obrigatório!',
        ];
    }
}
