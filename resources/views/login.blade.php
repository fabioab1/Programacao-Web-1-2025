<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-PAS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-card {
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.85);
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .logo-sus {
            transition: transform 0.3s ease;
            opacity: 0.9;
        }

        .logo-sus:hover {
            transform: scale(1.05);
            opacity: 1;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .card-header h4 {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="col-md-6 col-lg-5">
            <div class="card login-card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Acesso ao sistema</h4>
                    <a href="/" class="btn btn-sm btn-light">Página inicial</a>
                </div>
                <div class="card-body">

                    <form method="POST" action="/login">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $e)
                                    <p class="mb-0">{{ $e }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
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

            <div class="text-center mt-4">
                <img src="{{ asset('storage/solicitacoes/sus.png') }}" alt="Logo SUS" height="50" class="logo-sus">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
