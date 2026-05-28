@extends('layouts.board')
@section('content')
        
<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Aula</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('courses.index') }}" class="text-decoration-none">Cursos</a>
            </li>
            <li class="breadcrumb-item active">Detalhes da Aula</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span><i class="fas fa-info-circle me-1"></i> Visualizar Detalhes da Aula</span>
        
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="btn btn-info btn-sm text-white me-1 mb-1 mb-sm-0">
                    <i class="fas fa-list me-1"></i> Aulas
                </a>

                <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-warning btn-sm me-1 mb-1 mb-sm-0">
                    <i class="fas fa-edit me-1"></i> Editar
                </a>

            @can('destroy-classe')
                <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST" class="d-inline-block" onclick="return confirm('Tem certeza que deseja excluir esta aula?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mb-1 mb-sm-0">
                        <i class="fas fa-trash me-1"></i> Apagar
                    </button>
                </form>
            @endcan
            
            </span>        
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $classe->id }}</dd>

                <dt class="col-sm-3">Nome da Aula</dt>
                <dd class="col-sm-9">{{ $classe->name }}</dd>

                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9">{!! nl2br(e($classe->description)) !!}</dd>

                <dt class="col-sm-3">Ordem da Aula</dt>
                <dd class="col-sm-9">{{ $classe->order_classe }}</dd>

                <dt class="col-sm-3">Curso Pertencente</dt>
                <dd class="col-sm-9"><span class="badge bg-secondary fs-6">{{ $classe->course->name }}</span></dd>

                <hr class="my-4 text-muted">

                <dt class="col-sm-3 text-muted">Cadastrado em</dt>
                <dd class="col-sm-9 text-muted">{{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3 text-muted">Atualizado em</dt>
                <dd class="col-sm-9 text-muted">{{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</dd>
            </dl> 
        </div>
    </div>  
</div>

@endsection