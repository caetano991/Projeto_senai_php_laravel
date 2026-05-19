@extends('layouts.board')
@section('content')
		
    <h2>Criar curso</h2>

    <a href="{{ route('courses.index') }}"><button type="button">Listar</button></a><br><br>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')
        <label>Curso:</label><br>
        <input type="text" id="name" name="name" placeholder="Nome do curso" value="{{ old('name') }}" required><br><br> 

        <label>Preço:</label><br>
        <input type="text" id="price" name="price" placeholder="Preço do curso" value="{{ old('price') }}" required><br><br> 
           
        <button type="submit">Criar curso</button>

    </form>

@endsection