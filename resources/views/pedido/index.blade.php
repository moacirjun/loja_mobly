@extends('layouts.app')

@section('title', 'Categoria')

@section('content')
    <div class="container">
        <h1 class="text-center">Detalhes Do Pedido</h1>

        <div class="row">
            <div class="col-sm-5">
                <div class="card mb-3">
                    <div class="card-header">Endereço de cobrança</div>

                    <div class="card-body">
                        <p><strong>Estado:</strong> {{$pedido->user->estado}}</p>
                        <p><strong>Cidade:</strong> {{$pedido->user->cidade}}</p>
                        <p><strong>Logradouro:</strong> {{$pedido->user->logradouro}}</p>
                        <p><strong>Número:</strong> {{$pedido->user->numero}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-7">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Qtde</th>
                        <th scope="col">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido->itens as $item)
                        <tr>
                            <th scope="row">{{ $item->getProdutoNome() }}</th>
                            <td>{{ $item->qtde }}</td>
                            <td>{{ $item->totalItemFormatted() }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th colspan="2" class="text-right">
                                Total:
                            </th>
                            <td>{{ $pedido->getTotalFormatted() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection