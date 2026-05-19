@extends('layouts.board')
@section('content')
		
    <h2>Listar os cursos</h2>

    @if (session('success'))
        <p style= "color: #082" >
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('courses.create') }}"><button type="button">Cadastrar</button></a><br><br>
    
    {{-- Imprimir Registros   --}}
    @forelse ($courses as $course)
        {{ $course->id }}
        {{ $course->name }}<br>
        {{ 'R$ ' . number_format($course->price, 2, ',', '.') }}<br>
        <a href="{{ route('classe.index', ['course' => $course->id]) }}"><button type="button">Aulas</button></a><br><br>
        <a href="{{ route('courses.show', ['course' => $course->id]) }}"><button type="button">Visualizar</button></a><br><br>
        <a href="{{ route('courses.edit', ['course' => $course->id]) }}"><button type="button">Editar</button></a><br><br>
        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" onclick="return confirm('Tem certeza que deseja excluir este curso?')"  method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Apagar</button>
        </form>
        <hr>
    @empty
        <p style= "color: #800" >
          Nenhum curso encontrado!
        </p>
    @endforelse

    {{-- Imprimir a paginação --}}
    {{ $courses->links() }}

@endsection