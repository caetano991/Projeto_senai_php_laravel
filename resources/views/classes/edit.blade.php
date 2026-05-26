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
            <li class="breadcrumb-item active">Editar Aula</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span><i class="fas fa-edit me-1"></i> Editar Aula</span>
        
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="btn btn-info btn-sm text-white me-1 mb-1 mb-sm-0">
                    <i class="fas fa-list me-1"></i> Voltar para Aulas
                </a>
                <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0">
                    <i class="fas fa-eye me-1"></i> Visualizar
                </a>
            </span>        
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form class="row g-3" action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="course_id" value="{{ $classe->course_id }}">

                <div class="col-12">
                    <label for="name" class="form-label fw-bold">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome da aula" value="{{ old('name', $classe->name) }}" required>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Descrição da aula">{{ old('description', $classe->description) }}</textarea>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-warning text-dark px-4">
                        <i class="fas fa-save me-1"></i> Salvar Alterações
                    </button>
                </div> 
            </form>
        </div>
    </div>  
</div>

@endsection