<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>e-PAS</title>


    {{-- Bootstrap CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">


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
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpjM5o0pZ5j4G3xF7G2Q8V2xN3zQJYl7N8FQ8z2F6M7L6T7Q5M4N3Q2L1K0J9"
        crossorigin="anonymous">
    </script>


    @stack('scripts')

</body>

</html>