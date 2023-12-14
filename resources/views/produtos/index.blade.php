
@extends('layouts.app')
@section('content')
    <div class="container" id="content-body">

        <div class="row mb-3">
            <div class="col">
                <h1>Listagem de Produtos</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>
            </div>
        </div>

        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <!-- Adicione mais botões conforme necessário -->
            </div>
        </div>

    <table  class="table table-hover">
        <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Estoque (Kg)</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produto as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm"> <i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
