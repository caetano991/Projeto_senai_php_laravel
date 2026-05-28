@extends('layouts.admin')
@section('content')

<div class="card mb-4 border-light shadow">
    <div class="card-header">
        <span>Pesquisar</span>
    </div>
    <div class="card-body">
        <form action="{{ route('user.index') }}">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    value="{{ request('name') }}" placeholder="Nome do usuário">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" 
                    value="{{ request('email') }}" placeholder="E-mail do usuário">
                </div>

                <div class="col-md-4 col-sm-12 mt-4 pt-3">
                    <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                    <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm">Limpar</a>

                    <!-- Botão Gerar PDF da Pesquisa -->
                        <a href="{{ url('generate-pdf-user?' . request()->getQueryString() ) }}" class="btn btn-danger btn-sm">     
                        <i class="fa-regular fa-file-pdf"></i> Gerar PDF</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header hstack gap-2">
        <span>Lista de alunos cadastrados</span>

        <span class="ms-auto">
            @can('create-user')
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                    Cadastrar
                </a>
            @endcan
                
            <a href="{{ route('user.generate-pdf')}}" class="btn btn-warning btn-sm">
                <i class="fa-regular fa-file-pdf"></i> Gerar PDF</a>
        </span>
    </div>

    <div class="card-body">

        @if(session('delete_success'))
        <script>
         document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Excluído!',
            text: "{{ session('delete_success') }}"
        });
    });
</script>
@endif

@if(session('create_success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Cadastrado!',
            text: "{{ session('create_success') }}"
        });
    });
</script>
@endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td class="text-center">

                        <a href="{{ route('user.show', $user->id) }}"
                            class="btn btn-primary btn-sm">
                            Visualizar
                        </a>

                        <a href="{{ route('user.edit', $user->id) }}"
                            class="btn btn-warning btn-sm">
                            Editar
                        </a>
                    
                    @can('destroy-user')
                        <form method="POST" id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">Apagar</button>
                        </form>
                    @endcan

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Nenhum aluno encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINAÇÃO --}}
        {{ $users->links() }}

    </div>
</div>

@endsection