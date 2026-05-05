<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    use HasFactory;
    protected $table = 'alunos';
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'data_nascimento',
        'email',
        'ddd',
        'telefone',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'país'
    ];
    protected $hidden = [
        'created_at',
        'update_at'
    ];

    protected $casts = [
        'data_nascimento' =>'date',
    ];
}
