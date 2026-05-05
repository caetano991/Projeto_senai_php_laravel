@extends('layouts.admin')
@section('content')
<a href="{{ route('user.index')}}">Página Inicial</a>
<h2>Cadastrar Aluno</h2>

@if ($errors->any())

@foreach($errors->all() as $error)
<p style="color: #f00;">
    {{ $error }}
</p>
@endforeach
@endif

<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-md-6">
        <label for="name" class="form-label">Nome: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nome do usuário"
            value="{{old('name')}}">
    </div><br>

    <div class="col-md-6">
        <label for="email" class="form-label">E-mail: </label>
        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail"
            value="{{ old('email')}}">
    </div><br>

    <div class="col-md-6">
        <label for="password" class="form-label">Senha: </label>
        <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
            <span class="input-group-text" role="button"
                onclick="togglePassword('password', this)">
                <i class="bi bi-eye"></i>
            </span>
        </div>
    </div>
<br>

    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Confirmar Senha: </label>
        <div class="input-group">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirme sua senha">
            <span class="input-group-text" role="button"
                onclick="togglePassword('password_confirmation', this)">
                <i class="bi bi-eye"></i>
            </span>
        </div>
    </div>

    {{-- FOTO COM COMPRIMENTO MENOR --}}
    <div class="col-md-4">
        <label for="image" class="form-label">Foto do usuário</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <br><br>

    <div class="col-12">
        <button type="submit" class="btn btn-warning btn-sm">Cadastrar</button>
    </div>
</form>
@endsection