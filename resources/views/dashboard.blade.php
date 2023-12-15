@extends('layouts.app')
@section('content')


<div class="row" id="content-body-dash">
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>

                    <p class="card-text"></p>
                    <a href="{{ route('produtos.index') }}" class="btn btn-primary">Ver produtos</a>
                </div>
            </div>
        </div>
</div>

@endsection
