@extends('layout')

@section('title', 'Carrinho')

@section('content')
    <div class="container">
        <h1 class="mb-3">Carrinho</h1>
        <tabela-carrinho
                carrinho="{{ $carrinho->formatToJson() }}"
                carrinho_url="{{ url('/carrinho/remover-produto') . '/' }}"
        >
        </tabela-carrinho>
    </div>
@endsection