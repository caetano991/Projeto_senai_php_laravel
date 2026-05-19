@extends('layouts.board')
@section('content')
		
    <h2>Detalhes do curso</h2>

    <a href="{{ route('courses.index') }}"><button type="button">Listar cursos</button></a><br><br>
    <a href="{{ route('courses.edit', ['course' => $course->id]) }}"><button type="button">Editar</button></a><br><br>

    ID: {{ $course->id }}<br>
    Nome: {{ $course->name }}<br>
    Preço: {{ 'R$ ' . number_format($course->price, 2, ',', '.') }}<br>
    Cadastrado em: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
    Atualizado em: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
    
    @if (session('success'))
        <p style= "color: #082" >
            {{ session('success') }}
        </p>
    @endif

@endsection