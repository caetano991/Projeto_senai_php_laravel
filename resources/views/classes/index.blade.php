@extends('layouts.board')
@section('content')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h2>Aulas do Curso</h2>
        <a href="{{ route('classe.create', ['course' => request()->route('course')]) }}" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Cadastrar Aula
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>Listar Aulas
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Nome</th>
                            <th style="width: 150px;">Preço</th>
                            <th class="text-center" style="width: 320px;">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($classes as $classe)
                        <tr>
                            <th class="text-center">{{ $classe->id }}</th>
                            <td>{{ $classe->name }}</td>
                            <td>{{ 'R$ ' . number_format($classe->price, 2, ',', '.') }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" class="btn btn-sm btn-info text-white">
                                        Visualizar
                                    </a>
                                    
                                    <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-sm btn-warning text-dark">
                                        Editar
                                    </a>

                                    <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta aula?')">
                                            Apagar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger mb-0 text-center" role="alert">
                                    Nenhuma aula encontrada para este curso!
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection