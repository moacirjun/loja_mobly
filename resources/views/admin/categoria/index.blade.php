@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div class="container">
        <table>
            <thead>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Atributos</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nome}}</td>
                        <td>{{$categoria->descricao}}</td>
                        <td>
                            <ul>
                                @foreach($caregoria->catacter as $atributo)
                                    <li>{{$atributo->nome}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection