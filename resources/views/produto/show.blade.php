@extends('layouts.app')

@section('title', 'Categoria')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $produto->nome }}</h1>

        <div class="media">
            <img class="mr-3 w-25" src="{{ $produto->imagem_url }}" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Media {{ $produto->descricao }}</h5>
            </div>
        </div>

        @if(count($semelhantes))
            <h1 class="text-center mt-5">Recomendados Para Você</h1>
            <lista-produto produtos="{{ $semelhantes->toJson() }}"></lista-produto>
        @endif
    </div>

@endsection