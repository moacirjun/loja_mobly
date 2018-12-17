@extends('layout')

@section('title', 'Catálogo de Categorias')

@section('content')
    <div class="container">
        @foreach($categorias as $categoria)
            <h2 class="text-center">{{ $categoria->nome }}</h2>

            <lista-produto produtos="{{ $categoria->produtos->toJson() }}"></lista-produto>
        @endforeach
    </div>

    <paginacao>
        {{ $categorias->links() }}
    </paginacao>
@endsection