@extends('layouts.board')
@section('content')
		
    <h2>Listar Aulas</h2>

    <a href="{{ route('courses.index') }}"><button type="button">Cursos</button></a><br><br>


    @if (session('success'))
        <p style= "color: #082" >
            {{ session('success') }}
        </p>
    @endif
  
    {{-- Imprimir Registros   --}}
    @forelse ($classes as $classe)<br>
        ID:{{ $classe->id }}<br>
        Nome:{{ $classe->name }}<br>
        Descrição:{{ $classe->description }}<br>
        Curso:{{ $classe->course_id }}<br>
        Cadastrado em: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado em: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}<br>
        <a href="{{ route('classe.show', ['classe' => $classe->id]) }}"><button type="button">Visualizar</button></a><br><br>
        <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}"><button type="button">Editar</button></a><br><br>
       
        <form action="{{ route('classe.destroy',['classe'=> $classe->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta aula?')">Excluir</button>
        </form>

        <hr>                
    @empty
        <p style= "color: #800" >
          Nenhum aula encontrada!
        </p>
    @endforelse

@endsection