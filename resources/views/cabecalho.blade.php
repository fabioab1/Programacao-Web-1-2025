{{-- =========================================================
     CABEÇALHO DESKTOP
     ========================================================= --}}

<nav class="navbar navbar-expand-lg bg-primary shadow-sm d-none d-lg-block">

    <div class="container-lg">

        {{-- Logo --}}
        <a class="navbar-brand text-white fw-bold fs-4" href="/">
            e-PAS
        </a>


        {{-- Navegação --}}
        <div class="d-flex align-items-center ms-auto">

            {{-- =================================================
                 ADMINISTRADOR
                 ================================================= --}}
            @if (Auth::user()->role == 'ADM')

            <ul class="navbar-nav align-items-center gap-1">

                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="/inicio">
                        Início
                    </a>
                </li>


                {{-- Usuários --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle text-white px-3"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Usuários
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                        <li>
                            <a class="dropdown-item py-2" href="/cargos">
                                Cargos
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/pacientes">
                                Pacientes
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/motoristas">
                                Motoristas
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/administradores">
                                Administradores
                            </a>
                        </li>

                    </ul>

                </li>


                {{-- Transporte --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle text-white px-3"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Transporte
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                        <li>
                            <a class="dropdown-item py-2" href="/pontos">
                                Pontos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/cidades">
                                Cidades
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/veiculos">
                                Veículos
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/aceitar-solicitacoes">
                                Solicitações
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="/viagens">
                                Viagens
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>

            @endif


            {{-- =================================================
                 MOTORISTA
                 ================================================= --}}
            @if (Auth::user()->role == 'MOT')

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="/inicio-mot">
                        Início
                    </a>
                </li>

            </ul>

            @endif


            {{-- =================================================
                 PACIENTE
                 ================================================= --}}
            @if (Auth::user()->role == 'PAC')

            <ul class="navbar-nav align-items-center gap-1">

                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="/inicio-pac">
                        Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="/solicitacoes">
                        Solicitações
                    </a>
                </li>

            </ul>

            @endif


            {{-- Separador --}}
            <div class="vr bg-white opacity-50 mx-3"></div>


            {{-- Perfil --}}
            <div class="dropdown">

                <button
                    class="btn btn-outline-light dropdown-toggle px-3"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    Meu perfil

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                    @if (Auth::user()->role == 'ADM')

                    <li>
                        <a
                            class="dropdown-item py-2"
                            href="/alterar-dados/admin/{{ Auth::user()->id }}">
                            Alterar dados
                        </a>
                    </li>

                    @endif


                    @if (Auth::user()->role == 'PAC')

                    <li>
                        <a
                            class="dropdown-item py-2"
                            href="/alterar-dados/paciente/{{ Auth::user()->id }}">
                            Alterar dados
                        </a>
                    </li>

                    @endif

                </ul>

            </div>


            {{-- Logout --}}
            <form method="POST" action="/logout" class="ms-2">

                @csrf

                <button
                    type="submit"
                    class="btn btn-danger px-3">
                    Sair
                </button>

            </form>

        </div>

    </div>

</nav>



{{-- =========================================================
     CABEÇALHO MOBILE
     ========================================================= --}}

<nav class="navbar bg-primary shadow-sm d-lg-none">

    <div class="container-fluid px-3">

        {{-- Logo --}}
        <a
            class="navbar-brand text-white fw-bold fs-4"
            href="/">

            e-PAS

        </a>


        {{-- Perfil --}}
        <div class="dropdown">

            <button
                class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="width: 42px; height: 42px;">

                <span class="fw-bold">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </span>

            </button>


            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                <li>
                    <h6 class="dropdown-header">
                        Minha conta
                    </h6>
                </li>


                @if (Auth::user()->role == 'ADM')

                <li>
                    <a
                        class="dropdown-item py-2"
                        href="/alterar-dados/admin/{{ Auth::user()->id }}">
                        Alterar dados
                    </a>
                </li>

                @endif


                @if (Auth::user()->role == 'PAC')

                <li>
                    <a
                        class="dropdown-item py-2"
                        href="/alterar-dados/paciente/{{ Auth::user()->id }}">
                        Alterar dados
                    </a>
                </li>

                @endif


                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>

                    <form method="POST" action="/logout">

                        @csrf

                        <button
                            type="submit"
                            class="dropdown-item text-danger py-2">
                            Sair
                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>



{{-- =========================================================
     BARRA DE NAVEGAÇÃO MOBILE
     ========================================================= --}}

<nav
    class="navbar bg-white border-top shadow-lg d-lg-none fixed-bottom"
    style="z-index: 1030;">

    <div class="container-fluid px-2">

        <div class="row w-100 g-0 text-center">


            {{-- =============================================
                 PACIENTE
                 ============================================= --}}

            @if (Auth::user()->role == 'PAC')

            <div class="col">

                <a
                    href="/inicio-pac"
                    class="nav-link py-2 text-dark">

                    <div class="small fw-semibold">
                        Início
                    </div>

                </a>

            </div>


            <div class="col">

                <a
                    href="/solicitacoes"
                    class="nav-link py-2 text-primary fw-bold">

                    <div class="small fw-semibold">
                        Solicitações
                    </div>

                </a>

            </div>


            <div class="col">

                <button
                    type="button"
                    class="nav-link w-100 border-0 bg-transparent py-2 text-dark"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#menuMobile"
                    aria-controls="menuMobile">

                    <div class="small fw-semibold">
                        Mais
                    </div>

                </button>

            </div>

            @endif



            {{-- =============================================
                 MOTORISTA
                 ============================================= --}}

            @if (Auth::user()->role == 'MOT')

            <div class="col">

                <a
                    href="/inicio-mot"
                    class="nav-link py-2 text-primary fw-bold">

                    <div class="small fw-semibold">
                        Início
                    </div>

                </a>

            </div>


            <div class="col">

                <button
                    type="button"
                    class="nav-link w-100 border-0 bg-transparent py-2 text-dark"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#menuMobile"
                    aria-controls="menuMobile">

                    <div class="small fw-semibold">
                        Mais
                    </div>

                </button>

            </div>

            @endif



            {{-- =============================================
                 ADMINISTRADOR
                 ============================================= --}}

            @if (Auth::user()->role == 'ADM')

            <div class="col">

                <a
                    href="/inicio"
                    class="nav-link py-2 text-dark">

                    <div class="small fw-semibold">
                        Início
                    </div>

                </a>

            </div>


            <div class="col">

                <button
                    type="button"
                    class="nav-link w-100 border-0 bg-transparent py-2 text-dark"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#menuMobile"
                    aria-controls="menuMobile">

                    <div class="small fw-semibold">
                        Menu
                    </div>

                </button>

            </div>

            @endif

        </div>

    </div>

</nav>



{{-- =========================================================
     OFFCANVAS MOBILE
     ========================================================= --}}

<div
    class="offcanvas offcanvas-bottom"
    tabindex="-1"
    id="menuMobile"
    aria-labelledby="menuMobileLabel"
    style="height: auto; max-height: 85vh; border-radius: 1.25rem 1.25rem 0 0;">

    <div class="offcanvas-header border-bottom">

        <div>

            <h5
                class="offcanvas-title fw-bold"
                id="menuMobileLabel">

                Menu

            </h5>

            <small class="text-muted">
                Escolha uma opção
            </small>

        </div>


        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Fechar">
        </button>

    </div>


    <div class="offcanvas-body">


        {{-- =============================================
             ADMINISTRADOR
             ============================================= --}}

        @if (Auth::user()->role == 'ADM')

        <div class="mb-4">

            <h6 class="text-muted fw-bold mb-2">
                Usuários
            </h6>

            <div class="list-group">

                <a
                    href="/cargos"
                    class="list-group-item list-group-item-action py-3">
                    Cargos
                </a>

                <a
                    href="/pacientes"
                    class="list-group-item list-group-item-action py-3">
                    Pacientes
                </a>

                <a
                    href="/motoristas"
                    class="list-group-item list-group-item-action py-3">
                    Motoristas
                </a>

                <a
                    href="/administradores"
                    class="list-group-item list-group-item-action py-3">
                    Administradores
                </a>

            </div>

        </div>


        <div>

            <h6 class="text-muted fw-bold mb-2">
                Transporte
            </h6>

            <div class="list-group">

                <a
                    href="/pontos"
                    class="list-group-item list-group-item-action py-3">
                    Pontos
                </a>

                <a
                    href="/cidades"
                    class="list-group-item list-group-item-action py-3">
                    Cidades
                </a>

                <a
                    href="/veiculos"
                    class="list-group-item list-group-item-action py-3">
                    Veículos
                </a>

                <a
                    href="/aceitar-solicitacoes"
                    class="list-group-item list-group-item-action py-3">
                    Solicitações
                </a>

                <a
                    href="/viagens"
                    class="list-group-item list-group-item-action py-3">
                    Viagens
                </a>

            </div>

        </div>

        @endif


        {{-- =============================================
             MOTORISTA
             ============================================= --}}

        @if (Auth::user()->role == 'MOT')

        <div class="list-group">

            <a
                href="/inicio-mot"
                class="list-group-item list-group-item-action py-3">
                Início
            </a>

        </div>

        @endif


        {{-- =============================================
             PACIENTE
             ============================================= --}}

        @if (Auth::user()->role == 'PAC')

        <div class="list-group">

            <a
                href="/inicio-pac"
                class="list-group-item list-group-item-action py-3">
                Início
            </a>

            <a
                href="/solicitacoes"
                class="list-group-item list-group-item-action py-3">
                Minhas solicitações
            </a>

        </div>

        @endif

    </div>

</div>