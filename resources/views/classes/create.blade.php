@extends('layouts.board')

@section('content')

<div class="container-fluid px-4">

    <div class="mb-1 hstack gap-2">

        <h2 class="mt-3">
            Aula
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

            <li class="breadcrumb-item">
                <a href="{{ route('classe.index', ['course' => $course->id]) }}"
                    class="text-decoration-none">

                    Aulas
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
                Cadastrar Aula
            </span>

            <span class="ms-auto">

                <a href="{{ route('classe.index', ['course' => $course->id]) }}"
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

            <form class="row g-3"
                action="{{ route('classe.store') }}"
                method="POST">

                @csrf
                @method('POST')

                <input type="hidden"
                    name="course_id"
                    value="{{ $course->id }}">

                <div class="col-12">

                    <label for="name" class="form-label">
                        Nome
                    </label>

                    <input type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Nome da aula"
                        value="{{ old('name') }}"
                        required>

                </div>

                <div class="col-12">

                    <label for="description" class="form-label">
                        Descrição
                    </label>

                    <textarea class="form-control"
                        id="description"
                        name="description"
                        rows="4"
                        required>{{ old('description') }}</textarea>

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

