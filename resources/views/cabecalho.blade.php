<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="/">e-PAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user()->role == 'ADM')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transporte
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pontos">Pontos</a></li>
                            <li><a class="dropdown-item" href="/cidades">Cidades</a></li>
                            <li><a class="dropdown-item" href="/veiculos">Veículos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/aceitar-solicitacoes">Solicitações</a></li>
                            <li><a class="dropdown-item" href="/viagens">Viagens</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role == 'MOT')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio-mot">Início</a>
                    </li>
                @endif

                @if (Auth::user()->role == 'PAC')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio-pac">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transporte
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/solicitacoes">Solicitações</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            {{-- Perfil --}}
            <div class="d-flex align-items-center gap-2">
                @if (Auth::user()->role == 'ADM')
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Meu perfil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/alterar-dados/admin/{{ Auth::user()->id }}">Alterar dados</a></li>
                        </ul>
                    </div>
                @endif

                @if (Auth::user()->role == 'PAC')
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Meu perfil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/alterar-dados/paciente/{{ Auth::user()->id }}">Alterar dados</a></li>
                        </ul>
                    </div>
                @endif

                {{-- Sair --}}
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-danger" type="submit">Sair</button>
                </form>
            </div>

        </div>
    </div>
</nav>
