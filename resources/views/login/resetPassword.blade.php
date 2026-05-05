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
                                    <h3 class="text-center font-weight-light my-4">Nova Senha</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('reset-password.submit') }}" method="POST">
	                                    @csrf
	                                    @method('POST')

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email" 
                                            placeholder="E-mail cadastrado"/>
                                            <label for="email">e-mail</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" 
                                            placeholder="Nova senha"/>
                                            <label for="password">Nova senha</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" 
                                            placeholder="Confirmar nova senha"/>
                                            <label for="password_confirmation">Confirmar nova senha</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" onclick="this.innerText = 'Atualizando...'">Atualizar Senha</button>
                                        </div>                                        
                                    </form>
                                </div>
                                 <div class="card-footer text-center py-3">
                                            <div class="small"> 
                                                <a href="{{ route('login.index') }}" class="text-decoration-none">Clique aqui para voltar ao login</a>
                                    </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection