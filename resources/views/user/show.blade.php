@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm">
        
        {{-- HEADER COM TÍTULO + BOTÕES --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Visualizar alunos</h4>

            <div>
                <a href="{{ route('user.index')}}" class="btn btn-secondary btn-sm">Listar</a>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>

            @can('destroy-user')
                <form method="POST" id="delete-form-{{ $user->id }}" 
                      action="{{ route('user.destroy', ['user' => $user->id]) }}" 
                      class="d-inline">
                    @csrf
                    @method('delete') 
                    <button type="button" onclick="confirmDelete( {{ $user->id }} )" 
                            class="btn btn-danger btn-sm">
                        Apagar
                    </button>
                </form>
            @endcan
            </div>
        </div>

        {{-- BODY --}}
        <div class="card-body">
            <div class="row">

                {{-- Foto --}}
                <div class="col-md-4 text-center">
                    @if ($user->image)
                        <img src="{{ asset('img/' . $user->image) }}" 
                             alt="Foto de perfil" 
                             class="img-fluid rounded mb-3">
                    @else
                        <span class="text-muted">Sem foto de perfil</span>
                    @endif
                </div>

                {{-- Dados --}}
                <div class="col-md-8">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>E-mail:</strong> {{ $user->email }}</p>
                    <p><strong>Cadastrado em:</strong> 
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}
                    </p>
                    <p><strong>Editado em:</strong> 
                        {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}
                    </p>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection