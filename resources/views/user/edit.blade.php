@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm border-0">
        
        {{-- HEADER --}}
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editar Aluno</h5>
            <a href="{{ route('user.index')}}" class="btn btn-primary btn-sm">
                Página Inicial
            </a>
        </div>

        {{-- BODY --}}
        <div class="card-body">

            {{-- ERROS --}}
            @if ($errors->any())
                <div class="alert alert-light border border-danger text-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.update', $user) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf   
                @method('PUT')

                <div class="row">

                    {{-- Nome --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Nome</label>
                        <input type="text" name="name" 
                               value="{{ old('name', $user->name) }}" 
                               class="form-control">
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">E-mail</label>
                        <input type="email" name="email" 
                               value="{{ old('email', $user->email) }}" 
                               class="form-control">
                    </div>

                    {{-- Senha --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Nova Senha</label>
                        <input type="password" name="password" 
                               class="form-control" 
                               placeholder="Digite a nova senha">
                    </div>

                    {{-- Confirmar Senha --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" 
                               class="form-control" 
                               placeholder="Confirme a senha">
                    </div>

                    {{-- Foto --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label text-muted">Foto do usuário</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>

                {{-- BOTÃO --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning btn-sm px-4">
                        Salvar
                    </button>
                </div>

            </form>
        </div>

       {{-- FOOTER --}}
<div class="card-footer bg-white d-flex justify-content-between">
    
    @if($prev)
        <a href="{{ route('user.edit', $prev->id) }}" 
           class="btn btn-outline-secondary btn-sm">
            ← Anterior
        </a>
    @endif

    @if($next)
        <a href="{{ route('user.edit', $next->id) }}" 
           class="btn btn-danger btn-sm ms-auto">
            Próximo →
        </a>
    @endif

</div>

    </div>

</div>
@endsection