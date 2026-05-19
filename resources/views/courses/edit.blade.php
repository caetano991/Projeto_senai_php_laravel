@extends('layouts.board')
@section('content')
		
    <h2>Editar curso</h2>

    <a href="{{ route('courses.index') }}"><button type="button">Listar</button></a><br><br>
    <a href="{{ route('courses.show', ['course' => $course->id]) }}"><button type="button">Visualizar</button></a><br><br>

     @if (session('success'))
        <p style= "color: #082" >
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Curso:</label><br>
        <input type="text" id="name" name="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}" required><br><br>  
        
        <label>Preço:</label><br>
        <input type="text" id="price" name="price" placeholder="Preço do curso" value="{{ old('price', $course->price) }}" required><br><br> 
        
        <button type="submit">Atualizar </button>

    </form>

@endsection