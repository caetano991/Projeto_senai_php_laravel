@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Aluno</h2>
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('user.index') }}">Aluno</a></li>
            <li class="breadcrumb-item active">Cadastrar Aluno</li>
        </ol>
    </div>
    <div class="card mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Cadastrar</span>
            <span class="ms-auto d-sm-flex flex-row">

                @can('index-user')
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm me-1"><i class="fa-solid fa-list"></i>
                    Listar</a>
                @endcan

            </span>
        </div>
        <div class="card-body">

            {{-- Correção do erro: Substituído <x-alert /> por @include --}}
            @include('components.alert')

            <!-- <form action="{{ route('user.store') }}" method="POST" class="row g-3"> -->
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('POST')

                {{-- Inserir Foto --}}
                <div class="col-12">
                    <label for="image" class="form-label">Foto do Aluno</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div><br>

                <div class="col-12">
                    <label for="name" class="form-label">Nome: </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome do aluno"
                        value="{{ old('name') }}">
                </div><br>

                <div class="col-12">
                    <label for="email" class="form-label">E-mail: </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail do aluno" value="{{ old('email') }}">
                </div><br>

                <div class="col-12">
                    <label for="password" class="form-label">Senha: </label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Senha" value="{{ old('password')}}">
                        <span class="input-group-text" role="button" onclick="togglePassword('password', this)"><i class="bi bi-eye"></i></span>
                    </div>
                </div><br>

                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirmar Senha: </label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirme sua senha" value="{{ old('password_confirmation')}}">
                        <span class="input-group-text" role="button" onclick="togglePassword('password_confirmation', this)"><i class="bi bi-eye"></i></span>
                    </div>
                </div>
            <br>

                <div class="col-12">
                    <label for="roles" class="form-label">Papel: </label>
                    <select name="roles" class="form-select" id="roles">
                        <option value="">Selecione</option>
                        @forelse ($roles as $role)
                        @if ($role != 'Super Admin')
                        <option {{ old('roles') == $role ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
                        @else
                        @if (Auth::user()->hasRole('Super Admin'))
                        <option {{ old('roles') == $role ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
                        @endif
                        @endif
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection