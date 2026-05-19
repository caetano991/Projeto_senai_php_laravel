<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClasseController extends Controller {
    public function index(Course $course)
    {
        // Lógica para listar as aulas de um curso específico
        $classes = Classe::with('course')
            ->where('course_id', $course->id)
            ->orderBy('created_at')
            ->get();

        // Retorna a VIEW com as aulas do curso
        return view('classes.index', ['classes' => $classes]);
    }      

            //Cadastrar no banco de dados a nova aula
        public function store(ClasseRequest $request){

            //Validar formulário
            $request->validated();

            //Recuperar a ultima ordem da aula do curso
            $lastOrderClasse = Classe::where('course_id', $request->course_id)
                ->orderBy('order_classe', 'DESC')
                ->first();

            //Cadastrar no banco de dados na tabela aula
            Classe::create([
                'name'=> $request->name,
                'description'=> $request->description,
                'order_classe'=>$lastOrderClasse->order_classe+1, 
                'course_id'=> $request->course_id,            
                ]);

        //Redirecionar o usuário, enviar uma mensagem 
        return redirect()->route('classe.index', ['course'=> $request->course_id])->with('success','Aula cadastrada com sucesso
        ');
    }

    //Carregar o formulário editar aula
    public function edit(Classe $classe){
        // Lógica para mostrar o formulário de edição de uma aula específica
        return view('classes.edit', ['classe' => $classe]);
    }

    public function update(ClasseRequest $request, Classe $classe){

        // Validar formulário
        $request->validated();

        // Editar as informações da aula no banco de dados
        $classe->update([
            'name'=> $request->name,
            'description'=> $request->description,            
        ]);

        // Redirecionar o usuário, enviar uma mensagem 
         return redirect()->route('classe.index', ['course'=> $classe->course_id])->with('success','Aula editada com sucesso');
    }

    // Detalhes da aula
    public function show(Classe $classe){

        // Carregar a VIEW
        return view('classes.show', ['classe' => $classe]);
    }

    public function destroy(Classe $classe){

    try {

        $classe->delete();

        return redirect()->route('classe.index', ['course'=> 
        $classe->course_id])->with('success','Aula excluída com sucesso');
        
    } catch (\Exception $e) {
        //Redirecionar usuario, enviar mensagem de erro 
        return redirect()->route('classe.index', ['course'=> 
        $classe->course_id])->with('errror','Não foi possivel excluir a aula.
        Verifique se ha dependencias relacionadas a esta aula');
        }
    }
}
