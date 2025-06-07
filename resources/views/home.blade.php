<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>e-PAS | Sistema de Agendamento de Transporte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/CSS_SCPA.css">
  <style>
    body {
      font-family: 'rawline', sans-serif;
    }
    .hero {
      background: linear-gradient(to right, #e3f2fd, #bbdefb);
      padding: 60px 0;
    }
    .hero h1 {
      font-weight: 700;
    }
    .info-img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }
    .info-img:hover {
      transform: scale(1.03);
    }
    .btn {
      transition: all 0.3s ease;
    }
    .btn:hover {
      transform: scale(1.05);
    }
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">e-PAS</a>
            <a class="btn btn-outline-light" href="/login">Login</a>
        </div>
    </nav>

    <section class="hero text-center text-dark">
        <div class="container">
            <h1>Bem-vindo ao e-PAS</h1>
            <p class="lead mt-3">Uma solução digital eficiente e inclusiva para o agendamento de transportes de pacientes do SUS.</p>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Sobre o sistema</h2>
                <p>O e-PAS (Sistema Eletrônico de Planejamento de Agendamento de Serviços) é uma iniciativa pensada para facilitar o acesso da população aos transportes oferecidos pelo Sistema Único de Saúde. Nosso objetivo é promover autonomia, agilidade e transparência no processo de solicitação de viagens para exames, consultas e procedimentos realizados fora do domicílio municipal.</p>
                <p>Com interface acessível e responsiva, o sistema está disponível para todos os pacientes cadastrados no SUS.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/solicitacoes/ambulancia.jpeg') }}" alt="Transporte SUS" class="info-img">
            </div>
        </div>
    </section>

    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            <small>e-PAS &copy; 2025 - Sistema Municipal de Saúde de Rancharia</small>
        </div>
    </footer>
</body>