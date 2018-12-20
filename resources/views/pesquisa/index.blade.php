@extends('layouts.app')

@section('title', 'Pesqisar')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Pesquisa</h1>
        @empty($param)
            <p class="lead">Mostrando todos os produtos</p>
        @else
            <p class="lead">Você está pesquisando por: "{{ $param }}"</p>
        @endempty
            
    </div>
    <lista-produto produtos="{{ $produtos->toJson() }}" param="{{ $param }}"></lista-produto>
    <paginacao>
        {{ $produtos->links() }}
    </paginacao>
@endsection