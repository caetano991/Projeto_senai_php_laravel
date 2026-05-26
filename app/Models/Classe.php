<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    //indica o nome da tabela    
    protected $table = 'classes';

   //indica os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name', 
        'description', 
        'order_classe',
        'course_id'
    ];

    //Cria um relacionamento entre um e muitos
    public function course()
    {
        return $this->belongsTo(Course::class);       
    }  
}
