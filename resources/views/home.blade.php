<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>e-PAS | Sistema de Agendamento de Transporte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e3f2fd, #f1f8ff);
      color: #333;
    }

    .hero {
      background: linear-gradient(to right, #1976d2, #42a5f5);
      color: white;
      padding: 100px 0;
    }

    .hero h1 {
      font-weight: 700;
    }

    .info-img {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .info-img:hover {
      transform: scale(1.03);
    }

    .btn-login {
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      transform: scale(1.05);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    footer {
      background-color: #1976d2;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">e-PAS</a>
      <div class="d-flex">
        <a class="btn btn-outline-light btn-login" href="/login">Login</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero text-center">
    <div class="container">
      <h1 class="display-5">Bem-vindo ao e-PAS</h1>
      <p class="lead mt-3">Uma solução digital eficiente e inclusiva para o agendamento de transportes de pacientes do SUS.</p>
    </div>
  </section>

  <!-- Sobre o sistema -->
  <section class="container my-5">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h2 class="fw-semibold mb-3">Sobre o sistema</h2>
        <p>O <strong>e-PAS</strong> (Sistema Eletrônico de Planejamento de Agendamento de Serviços) é uma iniciativa pensada para facilitar o acesso da população aos transportes oferecidos pelo Sistema Único de Saúde.</p>
        <p>Nosso objetivo é promover autonomia, agilidade e transparência no processo de solicitação de viagens para exames, consultas e procedimentos realizados fora do domicílio municipal.</p>
        <p>Com interface acessível e responsiva, o sistema está disponível para todos os pacientes cadastrados no SUS.</p>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('storage/solicitacoes/ambulancia.jpeg') }}" alt="Transporte SUS" class="info-img">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-white text-center py-3 mt-5">
    <div class="container">
      <small>e-PAS &copy; 2025 - Sistema Municipal de Saúde de Rancharia</small>
    </div>
  </footer>

</body>
</html>
