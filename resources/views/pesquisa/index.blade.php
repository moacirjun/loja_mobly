@extends('layouts.app')

@section('title', 'Pesqisar')

@section('content')
    <lista-produto produtos="{{ $produtos->toJson() }}"></lista-produto>
    <paginacao>
        {{ $produtos->links() }}
    </paginacao>
@endsection