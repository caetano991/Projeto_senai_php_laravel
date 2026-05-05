<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller{
    
    //Listar os cursos
    public function index(){

        return view('course.index');    
}

//Mostrar os detalhes de um curso específico
    public function show(){

        return view('course.show');    
}

//Carregar o formulário para criar um novo curso
    public function create(){

        return view('course.create');    
}

//Processar o formulário para criar um novo curso
    public function store(Request $request){

        // Lógica para armazenar o curso no banco de dados
        return redirect()->route('course.index')->with('success', 'Curso criado com sucesso!');
}

//Carregar o formulário para editar um curso existente
    public function edit(){

        return view('course.edit');    
}

//Processar o formulário para atualizar um curso existente
    public function update(Request $request){

        // Lógica para atualizar o curso no banco de dados
        return redirect()->route('course.index')->with('success', 'Curso atualizado com sucesso!');
}

//Excluir um curso existente
    public function destroy(){

        // Lógica para excluir o curso do banco de dados
        return redirect()->route('course.index')->with('success', 'Curso excluído com sucesso!');
}
}
