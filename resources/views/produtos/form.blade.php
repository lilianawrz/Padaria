@extends('layouts.app')
@section('content')
@php
if (!empty($produto->id)) {
    $route = route('produtos.update', $produto->id);
} else {
    $route = route('produtos.store');
}
@endphp

<div class="container mt-5">
    <h1>Formulário de produto</h1>
    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (!empty($produto->id))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="@if (!empty($produto->nome)) {{ $produto->nome }}@elseif(!empty(old('nome'))) {{ old('nome') }} @else{{ '' }} @endif" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" class="form-control" required>@if (!empty($produto->descricao)) {{ $produto->descricao }}@elseif(!empty(old('descricao'))) {{ old('descricao') }} @else{{ '' }} @endif</textarea>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" name="preco" step="0.01" class="form-control" value="@if (!empty($produto->preco)) {{ $produto->preco }}@elseif(!empty(old('preco'))) {{ old('preco') }} @else{{ '' }} @endif" required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" class="form-control" value="@if (!empty($produto->quantidade)) {{ $produto->quantidade }}@elseif(!empty(old('quantidade'))) {{ old('quantidade') }} @else{{ '' }} @endif" required>
        </div>

        <div class="mb-3">
            <label for="limitePeso" class="form-label">Limite de Peso:</label>
            <input type="number" name="limitePeso" step="0.01" class="form-control" value="@if (!empty($produto->limitePeso)) {{ $produto->limitePeso }}@elseif(!empty(old('limitePeso'))) {{ old('limitePeso') }} @else{{ '' }} @endif" required>
        </div>

        <div class="mb-3">
            <label for="validade" class="form-label">Data de validade:</label>
            <input type="date" name="validade" class="form-control" value="@if (!empty($produto->validade)) {{ $produto->validade }}@elseif(!empty(old('validade'))) {{ old('validade') }} @else{{ '' }} @endif" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categoria as $categoria)
                    <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem:</label>
            <input type="file" name="imagem" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    </form>
</div>
@endsection
