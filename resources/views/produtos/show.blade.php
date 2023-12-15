@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h1 id="nome">{{ $produto->nome }}</h1>
            <p id="descricao">{{ $produto->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
            <p><strong>Peso em estoque:</strong> <span id="pesoEstoque">{{ $produto->pesoEstoque }} g</span></p>
            <p><strong>Peso limite:</strong> {{ $produto->pesoLimite }} g</p>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function atualizarPagina() {
        $.ajax({
            url: '{{ route('produtos.show', $produto->id) }}',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#nome').text(response.produto.nome);
                $('#descricao').text(response.produto.descricao);
                $('#pesoEstoque').text(response.produto.pesoEstoque + ' g');
                // Adicione atualizações para outros campos conforme necessário
                setTimeout(atualizarPagina, 5000);
            },
            error: function(error) {
                console.error('Erro ao obter dados do servidor:', error);
                setTimeout(atualizarPagina, 5000);
            }
        });
    }

    atualizarPagina();
</script>

@endsection
