<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-PAS | Sistema de Agendamento de Transporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/CSS_SCPA.css">
    <style>
        body.login-background {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.85), rgba(230, 230, 255, 0.75)),
            url("{{ asset('storage/solicitacoes/fundo.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'rawline', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .login-overlay {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(4px);
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0;
        }

        .login-card-container {
            position: relative;
            z-index: 1;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(2px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .logo-sus {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .logo-sus:hover {
            transform: scale(1.1);
            opacity: 0.9;
        }
    </style>
</head>

<body class="login-background">
    <!-- camada esbranquiçada com blur -->
    <div class="login-overlay"></div>

    <!-- conteúdo de login -->
    <div class="container login-card-container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Acesso ao sistema</h4>
                        <a href="/" class="btn btn-sm btn-light">Pagina inicial</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/login">

                            @csrf

                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $e)
                                <p>{{ $e }}</p>
                                @endforeach
                            </div>
                            @endif

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                                <a href="/cadastro/pacientes" class="btn btn-outline-secondary">Criar conta</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <img src="{{ asset('storage/solicitacoes/sus.png') }}" alt="SUS" height="50" class="logo-sus">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>