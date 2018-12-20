@extends('layouts.app')

@section('title', 'Catálogo de Produtos')

@section('content')
    <lista-produto produtos="{{ $produtos->toJson() }}"></lista-produto>
    <paginacao>
        {{ $produtos->links() }}
    </paginacao>
@endsection