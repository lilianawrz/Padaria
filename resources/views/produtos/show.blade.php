
@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $produto->nome }}</h1>
            <p>{{ $produto->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
            <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
            <p><strong>Limite de Peso:</strong> {{ $produto->limitePeso }}</p>
            <p><strong>Validade:</strong> {{ $produto->validade }}</p>
            <p><strong>Categoria:</strong> {{ $produto->categoria->nome }}</p>


            <div class="btn-group" role="group" aria-label="Botões de Ação">
                <div>
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                </div>
                <div style="margin-left: 2px">
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                </form>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <img src="{{ asset('storage/imagens/'.$produto->imagem) }}" alt="{{ $produto->nome }}" class="img-fluid">
        </div>
    </div>
</div>
@endsection
