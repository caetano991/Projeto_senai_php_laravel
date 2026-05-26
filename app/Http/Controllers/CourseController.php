<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Listar os cursos
    // Listar os cursos
public function index()
{
    // Recuperar os cursos ordenados pelo ID do mais novo para o mais antigo
    $courses = Course::orderBy('id', 'DESC')->paginate(6);

    // Carregar a VIEW
    return view('courses.index', ['courses' => $courses]);    
}

    // Mostrar os detalhes de um curso específico
    public function show(Course $course)
    {
        // Carregar a VIEW
        return view('courses.show', ['course' => $course]);
    }

    // Carregar o formulário para criar um novo curso
    public function create()
    {
        return view('courses.create');    
    }

    // Processar o formulário e CADASTRAR o novo curso no banco de dados
    public function store(Request $request)
    {
        // 1. Validar o formulário com os campos corretos que vêm da sua VIEW
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required'  => 'O campo nome é obrigatório.',
            'price.required' => 'O campo preço é obrigatório.',
            'price.numeric'  => 'O preço precisa ser um número válido.',
        ]);

        // Marca o início da transação
        DB::beginTransaction();

        try {
            // 2. Cadastrar na tabela correta: CURSOS
            Course::create([
                'name'  => $validated['name'],
                'price' => $validated['price'],
            ]);

            // Operação concluída com êxito, confirmar a transação
            DB::commit();   
        
            // Redirecionar o usuário para a listagem com mensagem de sucesso
            return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');

        } catch (\Exception $e) {
            // Cancelar a transação em caso de falha
            DB::rollBack();

            // Redirecionar de volta mantendo o que o usuário digitou
            return back()->withInput()->with('error', 'Não foi possível cadastrar o curso. Tente novamente.');
        }
    }

    // Carregar o formulário para editar um curso existente
    public function edit(Course $course)
    {
        // Carregar a VIEW
        return view('courses.edit', ['course' => $course]);    
    }

    // Processar o formulário para atualizar um curso existente
    public function update(Request $request, Course $course)
    {
        // Validar formulário de curso
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Editar as informações do CURSO no banco de dados
            $course->update([
                'name'  => $validated['name'],
                'price' => $validated['price'],            
            ]);

            DB::commit();

            return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Não foi possível editar o curso. Tente novamente.');
        }
    }

    // Excluir um curso existente
    public function destroy(Course $course)
    {
        try {
            // Deleta o curso
            $course->delete();

            return redirect()->route('courses.index')->with('success', 'Curso excluído com sucesso!');
            
        } catch (\Exception $e) {
            // Se houver restrição de chave estrangeira (aulas ligadas a ele) cairá aqui
            return redirect()->route('courses.index')->with('error', 'Não foi possível excluir o curso. Verifique se há aulas associadas a ele.');
        }
    }
}


/*
namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller{
    
    //Listar os cursos
    public function index(){
        //Recuperar os cursos do banco de dados
        $courses = Course::paginate(3);

        //Carregar a VIEW
        return view('courses.index', ['courses' => $courses]);    
}

//Mostrar os detalhes de um curso específico
    public function show(Course $course){
    
        //Carregar a VIEW
        return view('courses.show', ['course' => $course]);
    }

//Carregar o formulário para criar um novo curso
    public function create(){
        return view('courses.create');    
}

//Processar o formulário para criar um novo curso

    //Cadastrar no banco de dados a nova aula
    public function store(ClasseRequest $request){

        //Validar formulário
        $request->validated();

        //Marca o ínicio da transação
        DB::beginTransaction();

        try {
        //Recuperar a ultima ordem da aula do curso
        $lastOrderClasse = Classe::where('course_id',$request->course_id)
            ->orderBy('order_classe', 'DESC')
            ->first();
    
        //Cadastrar no banco de dados na tabela aula
        Classe::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'order_classe'=>$lastOrderClasse->order_classe+1, 
            'course_id'=> $request->course_id,            
            ]);

        //Operação concluída com êxito, confirmar a transação
        DB::commit();   
    
        //Redirecionar o usuário, enviar uma mensagem 
        return redirect()->route('classe.show', ['course'=> $request->course_id])->with('success','Aula cadastrada com sucesso
    ');
}
        catch(\Exception $e){

            //Cancelar a transação
            DB::rollBack();

            //Redirecionar o usuário, enviar uma mensagem de erro
            return back()->withInput()->with('error','Não foi possível cadastrar o curso. Tente novamente.');
        }
    }

//Carregar o formulário para editar um curso existente
    public function edit(Course $course){
    
        //Carregar a VIEW
        return view('courses.edit', ['course' => $course]);    
}

//Processar o formulário para atualizar um curso existente
    public function update(ClasseRequest $request, Classe $classe){
        // Validar formulário
        $request->validated();

        //Marca o ínicio da transação
        DB::beginTransaction();

        try {
        // Editar as informações da aula no banco de dados
        $classe->update([
            'name'=> $request->name,
            'description'=> $request->description,            
        ]);

        //Operação concluída com êxito, confirmar a transação
        DB::commit();

        }
        catch(\Exception $e){

            //Cancelar a transação
            DB::rollBack();

            //Redirecionar o usuário, enviar uma mensagem de erro
            return back()->withInput()->with('error','Não foi possível editar o curso. Tente novamente.');
        }
    }

//Excluir um curso existente
    public function destroy(Classe $classe){

    try {

        $classe->delete();

        return redirect()->route('classe.index', ['course'=> $classe->course_id])->
        with('success','Aula excluída com sucesso');
        
        } catch (\Exception $e) {
        //Redirecionar usuario, enviar mensagem de erro 
        return redirect()->route('courses.index')->with('error', 'Não foi possivel 
        excluir o curso. Verefique se ha aulas associadas a ele');
        }
    }
}
    */
