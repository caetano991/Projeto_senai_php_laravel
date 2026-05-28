@extends('layouts.board')
@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Curso</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Cursos</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span>Listar</span>

            <span class="ms-auto">
                @can('create-course')
                <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                @endcan
            </span>
        </div>
        <div class="card-body">
            @if (session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
            @endif
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="d-none d-md-table-cell">ID</th>
                        <th>Nome</th>
                        <th class="d-none d-sm-table-cell">Preço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <th class="d-none d-md-table-cell">{{ $course->id }}</th>
                        <td>{{ $course->name }}</td>
                        <td class="d-none d-sm-table-cell">{{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</td>
                        <td class="d-md-flex flex-row justify-content-center">
                            <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="btn btn-info btn-sm me-1 mt-1 mt-md-0">Aulas</a>
                            <a href="{{ route('courses.show', ['course' => $course->id]) }}" class="btn btn-primary btn-sm me-1 mt-1 mt-md-0">Visualizar</a>
                            <a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="btn btn-warning btn-sm me-1 mt-1 mt-md-0">Editar</a>

                            @can('delete-course')
                            <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" onclick="return confirm('Tem certeza que deseja excluir este curso?')" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm me-1 mt-1 mt-md-0">Apagar</button>
                            </form>
                            @endcan
                            
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger" role="alert">
                        Nenhum curso encontrado!
                    </div>
                    @endforelse
                </tbody>


            </table>
        </div>
    </div>
</div>

{{-- Imprimir a paginação --}}
{{-- {{ $courses->links() }} --}}

@endsection