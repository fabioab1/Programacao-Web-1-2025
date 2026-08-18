<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-PAS</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    {{-- Estilos globais do e-PAS --}}
    <style>
        /*
         * Base visual
         */
        body {
            min-height: 100vh;
        }


        /*
         * Área principal
         *
         * Espaço adicional no mobile para que a
         * barra de navegação inferior não cubra
         * o conteúdo da página.
         */
        @media (max-width: 991.98px) {

            main {
                padding-bottom: 90px !important;
            }

        }


        /*
         * Links da barra inferior
         */
        .navbar.fixed-bottom .nav-link {
            min-height: 64px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 0.75rem;

            margin: 4px;
        }


        /*
         * Feedback visual ao tocar
         */
        .navbar.fixed-bottom .nav-link:active {
            background-color: rgba(13, 110, 253, 0.08);
        }


        /*
         * Dropdowns
         */
        .dropdown-menu {
            min-width: 210px;
        }


        /*
         * Itens dos menus
         */
        .dropdown-item {
            border-radius: 0.4rem;
        }


        /*
         * Área de toque confortável no mobile
         */
        @media (max-width: 991.98px) {

            .dropdown-item {
                padding-top: 0.7rem;
                padding-bottom: 0.7rem;
            }

        }
    </style>

</head>


<body class="bg-light">


    {{-- Cabeçalho --}}
    @auth
    @include('cabecalho')
    @endauth


    {{-- Conteúdo --}}
    <main class="container-lg my-4 px-3">

        @yield('conteudo')

    </main>

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    @stack('scripts')

</body>

</html>