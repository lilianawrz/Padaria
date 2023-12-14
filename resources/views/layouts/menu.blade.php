<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand p-4" href="#" id="padaria">Padaria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Estatística</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="companyDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="productDropdown">
                        <a class="dropdown-item" href="{{ route('produtos.create') }}">Novo produto</a>
                        <a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>
