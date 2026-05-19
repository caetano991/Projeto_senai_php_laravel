<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     use HasFactory;
    
    //indica o nome da tabela
    protected $table = 'courses';

    //indica os campos que podem ser preenchidos em massa
    protected $fillable = ['name', 'price'];

    //Cria um relacionamento um-para-muitos
    public function classe()
    {
        return $this->hasMany(Classe::class);       
    }

}
