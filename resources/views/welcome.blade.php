<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel de Bicicletas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajustes gerais */
        .navbar {
            padding: 0.2rem 1rem;
        }
        .navbar-brand {
            font-size: 1rem;
        }
        .navbar-nav .nav-link {
            font-size: 0.9rem;
        }
        .navbar-toggler {
            padding: 0.2rem;
        }
        /* Fundo com imagem */
        .bg-full {
            background: url('{{ asset("images/bicicleta-fundo.png") }}') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            position: relative;
            min-height: 100vh;
        }
        .bg-full::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Sobreposição escura */
            z-index: 0;
        }
        .bg-full > * {
            position: relative;
            z-index: 1;
        }
        /* Ajuste para a seção de funcionalidades */
        .features {
            padding: 3rem 0;
            color: white;
        }
        .features .col-md-3 {
            margin-bottom: 1rem;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 0.5rem 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aluguel de Bicicletas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/bicicletas">Bicicletas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Fundo abrangendo o cabeçalho e a seção de funcionalidades -->
    <div class="bg-full">
        <header class="text-center">
            <div class="container">
                <h1>Bem-vindo ao Aluguel de Bicicletas</h1>
                <p class="lead">Transforme sua mobilidade urbana com sustentabilidade e eficiência.</p>
                <div class="btn-group">
                    <a href="/bicicletas" class="btn btn-light btn-lg">Veja Nossas Bicicletas</a>
                    <a href="{{ route('bicicletas.create') }}" class="btn btn-warning btn-lg">Anuncie</a>
                </div>
            </div>
        </header>

        <!-- Seção de funcionalidades -->
        <section class="container features text-center">
            <div class="row">
                <div class="col-md-3">
                    <i class="fas fa-bicycle fa-3x mb-3"></i>
                    <h3>Fácil de Alugar</h3>
                    <p>Escolha sua bicicleta favorita e alugue em poucos minutos</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-leaf fa-3x mb-3"></i>
                    <h3>Sustentável</h3>
                    <p>Contribua para um planeta mais verde enquanto se locomove</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-bullhorn fa-3x mb-3"></i>
                    <h3>Fácil de Anunciar</h3>
                    <p>Cadastre sua bicicleta e alcance mais pessoas interessadas em alugar</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                    <h3>Gere Renda</h3>
                    <p>Transforme sua bicicleta em uma fonte de renda extra ao alugá-la para outras pessoas</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; {{ date('Y') }} Aluguel de Bicicletas. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
