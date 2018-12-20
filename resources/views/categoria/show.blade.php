@extends('layouts.app')

@section('title', 'Categoria')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $categoria->nome }}</h1>
    </div>

    <lista-produto produtos="{{ $categoria->produtos->toJson() }}"></lista-produto>
@endsection