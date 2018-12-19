@extends('layout')

@section('title', 'HOME')

@section('content')
    <lista-produto produtos="{{ json_encode($produtos) }}"></lista-produto>
    <paginacao>
        {{ $produtos->links() }}
    </paginacao>
@endsection