<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bicicleta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset("images/bicycle-icon.jpeg") }}') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
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
                    <!-- Botão "Voltar" que redireciona para a página index.blade.php -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('bicicletas.index') }}">Voltar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bicicletas.create') }}">Adicionar Bicicleta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Bicicleta</h1>

        <!-- Exibe a mensagem se não houver bicicletas cadastradas -->
        @if(session('message'))
            <div class="alert alert-warning text-center">
                {{ session('message') }}
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        @if (isset($bicicleta))
                            <img src="{{ asset('storage/' . $bicicleta->imagem) }}" class="card-img-top" alt="Imagem da Bicicleta">
                            <div class="card-body">
                                <form action="{{ route('bicicletas.update', $bicicleta->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $bicicleta->descricao }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor" class="form-label">Valor</label>
                                        <input type="number" class="form-control" id="valor" name="valor" value="{{ $bicicleta->valor }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Alterar Bicicleta</button>
                                </form>
                            </div>
                        @else
                            <p class="text-center">Nenhuma bicicleta encontrada para edição.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Aluguel de Bicicletas. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
