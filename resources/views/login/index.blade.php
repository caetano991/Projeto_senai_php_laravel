@extends('layouts.login')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Área Restrita</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login.proccess') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail de usuário" value="{{old('email') }}"/>
                                            <label for="email">Digite seu e-mail</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" 
                                            placeholder="Senha"/>
                                            <label for="password">Digite a senha</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a href="{{ route('forget-password.show') }}" class="small text-decoration-none">Esqueceu a senha?</a>
                                            <button type="submit" class="btn btn-primary">Entrar</button>
                                        </div>                                        
                                    </form>
                                </div>
                                    <div class="card-footer text-center py-3">
                                            <div class="small"> <a href="{{ route('login.create-user') }}" class="text-decoration-none">Não tem uma conta? Registre-se</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection