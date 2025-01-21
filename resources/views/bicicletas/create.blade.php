<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Bicicleta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Plano de fundo da página */
        body {
            background: url('{{ asset("images/bicicleta2-fundo.jpg") }}') no-repeat center center fixed;
            background-size: cover;
        }

        /* Ajustes no conteúdo para melhor visibilidade */
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Fundo branco semi-transparente */
            border: none;
        }
        h1, label {
            color: #333; /* Cor mais visível em um fundo claro */
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
                    <li class="nav-item"><a class="nav-link" href="/bicicletas">Voltar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Adicionar Nova Bicicleta</h1>

        <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
            <form action="/bicicletas" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nome da Bicicleta --
                <!-- Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descreva a bicicleta (opcional)"></textarea>
                </div>

                <!-- Valor -->
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor (R$)</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="Insira o valor em reais" min="0" step="0.01" required>
                </div>

                <!-- Upload da Imagem -->
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem da Bicicleta</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
                </div>

                <!-- Botão de Envio -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar Bicicleta</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Aluguel de Bicicletas. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


