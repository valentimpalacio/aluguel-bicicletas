<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Disponíveis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset("images/bicycle-icon.jpeg") }}') no-repeat center center fixed;
            background-size: cover; /* Faz a imagem cobrir toda a tela */
        }
        .card {
            border: none;
            background-color: rgba(255, 255, 255, 0.9); /* Fundo branco semi-transparente */
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        h1 {
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Aluguel de Bicicletas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Página Inicial</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bicicletas.create') }}">Adicionar Bicicleta</a></li>
                    <!-- Adicionando o botão "Alterar Bicicleta" -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('bicicletas.edit', 1) }}">Alterar Bicicleta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Bicicletas Disponíveis para Aluguel</h1>
        <div class="row">
            @foreach ($bicicletas as $bicicleta)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $bicicleta->imagem) }}" class="card-img-top" alt="Imagem da Bicicleta">
                        <div class="card-body">
                            <p class="card-text">{{ $bicicleta->descricao }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($bicicleta->valor, 2, ',', '.') }}</strong></p>
                            <a href="#" class="btn btn-primary">Alugar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($bicicletas->isEmpty())
            <p class="text-center text-white">Nenhuma bicicleta disponível no momento.</p>
        @endif
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Aluguel de Bicicletas. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
