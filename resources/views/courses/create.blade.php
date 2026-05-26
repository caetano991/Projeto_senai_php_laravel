@extends('layouts.board')

@section('content')

<div class="container-fluid px-4">

    <div class="mb-1 hstack gap-2">

        <h2 class="mt-3">
            Curso
        </h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">

            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">
                    Dashboard
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('courses.index') }}"
                   class="text-decoration-none">

                    Cursos
                </a>
            </li>

            <li class="breadcrumb-item active">
                Cadastrar
            </li>

        </ol>

    </div>

    <div class="card mb-4">

        <div class="card-header hstack gap-2">

            <span>
                Cadastrar Curso
            </span>

            <span class="ms-auto">

                <a href="{{ route('courses.index') }}"
                   class="btn btn-secondary btn-sm">

                    Listar
                </a>

            </span>

        </div>

        <div class="card-body">

            @if (session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            @if (session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif

            <form class="row g-3" action="{{ route('courses.store') }}" method="POST">

                @csrf
                @method('POST')

                <div class="col-12">

                    <label for="name" class="form-label">
                        Nome
                    </label>

                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Nome do curso"
                           value="{{ old('name') }}"
                           required>

                </div>

                <div class="col-12">

                    <label for="price" class="form-label">
                        Preço
                    </label>

                    <input type="number"
                           step="0.01"
                           class="form-control"
                           id="price"
                           name="price"
                           placeholder="Preço do curso"
                           value="{{ old('price') }}"
                           required>

                </div>

                <div class="col-12">

                    <button type="submit"
                            class="btn btn-success btn-sm">

                        Cadastrar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

<!-- @extends('layouts.board')
@section('content')
        
<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Curso</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('courses.index') }}" class="text-decoration-none">Cursos</a>
            </li>
            <li class="breadcrumb-item active">Cadastrar Curso</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span><i class="fas fa-plus me-1"></i> Cadastrar Novo Curso</span>
            <span class="ms-auto">
                <a href="{{ route('courses.index') }}" class="btn btn-info btn-sm text-white">
                    <i class="fas fa-list me-1"></i> Listar Cursos
                </a>
            </span>        
        </div>
        <div class="card-body">
            
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form class="row g-3" action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="col-12">
                    <label for="name" class="form-label fw-bold">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do curso" value="{{ old('name') }}" required>
                </div>

                <div class="col-12">
                    <label for="price" class="form-label fw-bold">Preço</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Preço do curso (Ex: 299.90). Use '.' para separar os centavos" value="{{ old('price') }}" required>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-1"></i> Cadastrar
                    </button>
                </div> 

            </form>
        </div>
    </div>  
</div>

@endsection -->
