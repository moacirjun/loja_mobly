@extends('layout')

@section('title', 'HOME')

@section('content')
    <lista-produto produtos="{{ $produtos->toJson() }}"></lista-produto>
    <paginacao>
        {{ $produtos->links() }}
    </paginacao>
@endsection