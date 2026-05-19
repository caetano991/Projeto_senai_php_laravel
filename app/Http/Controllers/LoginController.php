<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    //validar os dados do usuário no login
    public function loginProcess(LoginRequest $request) {
        $request->validated();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.index');
        }

        // Se falhar o login, precisa retornar algo aqui também!
        return back()->with('error', 'E-mail ou senha inválidos!');
    }

    //Carregar o formulário cadastrar usuário
    public function create()
    {
        //carregar a view do formulário cadastrar usuário
        return view('login.create');
    }      
    
    //Processar o formulário cadastrar usuário
    public function store(LoginUserRequest $request)
    {
        //validar os dados do formulário
        $request->validated();
        
        try {
            //Criar o usuário
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            //Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('login.index')->with('success', 'Usuário cadastrado com sucesso! Faça login para acessar a página de usuários.');

        } catch (\Exception $e) {
            //Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Erro ao cadastrar usuário: ' . $e->getMessage());
        }
    
    }
        
    public function destroy(){

        //Deslogar o usuário
        Auth::logout();

        //Redirecionar o usuário para a página de login
        return redirect()->route('login.index')->with('success', 'Logout realizado com sucesso!');
    }   
}
