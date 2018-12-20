@extends('layouts.app')

@section('title', 'Categoria')

@section('content')
    <div class="container">
        <h1 class="text-center">Seus Dados</h1>

        <div class="row">
            <div class="col-sm-5">
                <div class="card mb-3">
                    <div class="card-header">Sua Conta</div>

                    <div class="card-body">
                        <p><strong>Nome:</strong> {{$user->name}}</p>
                        <p><strong>Email:</strong> {{$user->email}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="card mb-3">
                    <div class="card-header">Endereço</div>

                    <div class="card-body">
                        <p><strong>Estado:</strong> {{$user->estado}}</p>
                        <p><strong>Cidade:</strong> {{$user->cidade}}</p>
                        <p><strong>Logradouro:</strong> {{$user->logradouro}}</p>
                        <p><strong>Número:</strong> {{$user->numero}}</p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-center m-3">Pedidos</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Pedido</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($user->pedidos as $pedido)
                    <tr>
                        <th scope="row">#{{ $pedido->id }}</th>
                        <td>{{ $pedido->getDataFormatted() }}</td>
                        <td>{{ $pedido->getStatus() }}</td>
                        <td>{{ $pedido->getTotalFormatted() }}</td>
                        <td>
                            <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-primary">
                                Detalhes
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection