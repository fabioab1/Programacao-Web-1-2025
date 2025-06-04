<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-PAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-3">

    <div class="row align-items-center">

      <div class="col d-flex justify-content-center">
        <img src="https://portalagita.com.br/wp-content/uploads/2023/10/Em-Sao-Joaquim-de-Bicas-Governo-de-Minas-entrega-17-micro-onibus-para-transporte-dos-pacientes-do-SUS-no-Medio-Paraopeba-2.jpeg" height="700" style="max-height: auto; max-width: auto;" class="rounded" alt=""/>

      </div>

      <div class="col-3">

        <h1 class="text-center mb-10">e-PAS</h1>

        <h2 class="text-center">Fazer login</h1>

        <form method="post" action="/login">
          
          @csrf

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $e)
            <p>{{ $e }}</p>
            @endforeach
          </div>
          @endif

          <div class="mb-3">
            <label for="email" class="form-label">Endereço de e-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required="">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control" required="">
          </div>

          <div class="mb-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Entrar</button>

          </div>

          <div class="mb-3 d-flex justify-content-end">
            <a class="btn btn-secondary" href="/cadastro/pacientes/">Criar uma conta</a>

          </div>          

        </form>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</div>

</html>