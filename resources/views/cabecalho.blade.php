<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold text-light" href="/">e-PAS</a>

        {{-- Botão Mobile --}}
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Links principais --}}
            <ul class="navbar-nav me-auto mb-3 mb-lg-0 gap-lg-2">

                {{-- ADMIN --}}
                @if (Auth::user()->role == 'ADM')

                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio">Início</a>
                    </li>

                    {{-- Dropdown Usuários --}}
                    <li class="nav-item dropdown position-static position-lg-relative">
                        <a class="nav-link dropdown-toggle text-light"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Usuários
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg-start dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="/cargos">Cargos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pacientes">Pacientes</a></li>
                            <li><a class="dropdown-item" href="/motoristas">Motoristas</a></li>
                            <li><a class="dropdown-item" href="/administradores">Administradores</a></li>
                        </ul>
                    </li>

                    {{-- Dropdown Transporte --}}
                    <li class="nav-item dropdown position-static position-lg-relative">
                        <a class="nav-link dropdown-toggle text-light"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Transporte
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg-start dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="/pontos">Pontos</a></li>
                            <li><a class="dropdown-item" href="/cidades">Cidades</a></li>
                            <li><a class="dropdown-item" href="/veiculos">Veículos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/aceitar-solicitacoes">Solicitações</a></li>
                            <li><a class="dropdown-item" href="/viagens">Viagens</a></li>
                        </ul>
                    </li>

                @endif

                {{-- MOTORISTA --}}
                @if (Auth::user()->role == 'MOT')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio-mot">Início</a>
                    </li>
                @endif

                {{-- PACIENTE --}}
                @if (Auth::user()->role == 'PAC')

                    <li class="nav-item">
                        <a class="nav-link text-light" href="/inicio-pac">Início</a>
                    </li>

                    <li class="nav-item dropdown position-static position-lg-relative">
                        <a class="nav-link dropdown-toggle text-light"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Transporte
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="/solicitacoes">Solicitações</a></li>
                        </ul>
                    </li>

                @endif

            </ul>

            {{-- Perfil + Logout --}}
            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">

                {{-- Perfil --}}
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle w-100 w-lg-auto"
                            type="button"
                            data-bs-toggle="dropdown">
                        Meu perfil
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        @if (Auth::user()->role == 'ADM')
                            <li>
                                <a class="dropdown-item"
                                   href="/alterar-dados/admin/{{ Auth::user()->id }}">
                                    Alterar dados
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role == 'PAC')
                            <li>
                                <a class="dropdown-item"
                                   href="/alterar-dados/paciente/{{ Auth::user()->id }}">
                                    Alterar dados
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                {{-- Logout --}}
                <form method="POST" action="/logout" class="w-100 w-lg-auto">
                    @csrf
                    <button class="btn btn-danger w-100">
                        Sair
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>
