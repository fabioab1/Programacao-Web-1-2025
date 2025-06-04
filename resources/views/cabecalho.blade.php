<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">e-PAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigatio">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user()->role == 'ADM')
                    <li class="nav-item">
                        <a class="nav-link" href="/inicio">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuários
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/cargos">Cargos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pacientes">Pacientes</a></li>
                            <li><a class="dropdown-item" href="/motoristas">Motoristas</a></li>
                            <li><a class="dropdown-item" href="/administradores">Administradores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Viagens
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pontos">Pontos</a></li>
                            <li><a class="dropdown-item" href="/cidades">Cidades</a></li>
                            <li><a class="dropdown-item" href="/veiculos">Veiculos</a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->role == 'MOT')

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/inicio-mot">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuários
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pacientes">Pacientes</a></li>
                        </ul>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Viagens
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/veiculos">Veiculos</a></li>
                        </ul>

                    </li>
                @endif
                @if (Auth::user()->role == 'PAC')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/inicio-pac">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Viagens
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/cargos">Solicitações</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            @if (Auth::user()->role == 'ADM')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Meu perfil
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/administradores/{{ Auth::user()->id }}/edit">Alterar dados</a></li>
                    </ul>
                </div>
            @endif
            @if (Auth::user()->role == 'PAC')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Meu perfil
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/alterar-dados/paciente/{{ Auth::user()->id }}">Alterar dados</a></li>
                    </ul>
                </div>
            @endif

            <form method="POST" class="d-flex" action="/logout">
                @csrf
                <button type="submit" class="btn btn-danger ms-2">Sair</button>
            </form>   
            
        </div>
    </div>
</nav>