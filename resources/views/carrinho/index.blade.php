@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <div class="container">
        <h1 class="mb-3">Carrinho</h1>
        @if( is_null($carrinho) )
            <h4>Seu carrinho está vazio</h4>
            <a href="{{ route('home') }}" class="btn btn-primary">Voltar as compras</a>
        @else
            <tabela-carrinho
                    carrinho="{{ $carrinho->formatToJson() }}"
                    carrinho_url="{{ url('/carrinho/remover-produto') . '/' }}"
            >
            </tabela-carrinho>
        @endif
    </div>
@endsection