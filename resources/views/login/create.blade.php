@extends('layouts.login')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Novo Usuário</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login.store-user') }}" method="POST">
	                                    @csrf
	                                    @method('POST')

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="name" 
                                            placeholder="Nome de usuário"/>
                                            <label for="name">Digite seu nome completo</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email" 
                                            placeholder="E-mail de usuário"/>
                                            <label for="email">Digite seu e-mail</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" 
                                            placeholder="Senha"/>
                                            <label for="password">Digite a senha</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>                                        
                                    </form>
                                </div>
                                    <div class="card-footer text-center py-3">
                                            <div class="small"> <a href="{{ route('login.index') }}" class="text-decoration-none"> Já tem uma conta? Faça login</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection 