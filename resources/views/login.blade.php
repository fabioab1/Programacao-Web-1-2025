<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-PAS | Acesso</title>


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <style>
        /*
         * =========================================================
         * BASE
         * =========================================================
         */

        body {
            min-height: 100vh;
            background:
                linear-gradient(135deg,
                    #f4f9ff 0%,
                    #e7f2fc 50%,
                    #dceefa 100%);
        }

        /*
         * =========================================================
         * CONTAINER
         * =========================================================
         */

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        /*
         * =========================================================
         * CARTÃO
         * =========================================================
         */

        .login-card {
            width: 100%;
            max-width: 460px;
            border: 0;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow:
                0 0.5rem 2rem rgba(0, 0, 0, 0.08);
        }
        
        /*
         * =========================================================
         * MARCA
         * =========================================================
         */

        .epas-logo {
            width: 78px;
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            border-radius: 1.25rem;
            background-color: #0d6efd;
            color: white;
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: -0.04em;
            box-shadow:
                0 0.5rem 1rem rgba(13, 110, 253, 0.20);
        }

        /*
         * =========================================================
         * CAMPOS
         * =========================================================
         */

        .form-label {
            font-weight: 600;
        }

        .form-control {
            min-height: 54px;
            border-radius: 0.75rem;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow:
                0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        /*
         * =========================================================
         * BOTÕES
         * =========================================================
         */

        .btn-login {
            min-height: 56px;
            border-radius: 0.75rem;
            font-weight: 600;
        }

        .btn-register {
            min-height: 52px;
            border-radius: 0.75rem;
            font-weight: 600;
        }

        /*
         * =========================================================
         * LINK DE RECUPERAÇÃO
         * =========================================================
         */

        .forgot-password {
            font-weight: 500;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /*
         * =========================================================
         * IDENTIDADE SUS
         * =========================================================
         */

        .public-service {
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        /*
         * =========================================================
         * MOBILE
         * =========================================================
         */

        @media (max-width: 575.98px) {

            .login-page {
                align-items: flex-start;
                padding: 1rem;
                padding-top: 2rem;
            }

            .login-card {
                border-radius: 1rem;
            }

            .login-card .card-body {
                padding: 1.5rem !important;
            }

            .epas-logo {
                width: 70px;
                height: 70px;
                font-size: 1.4rem;
            }

        }
    </style>

</head>

<body>

    <div class="login-page">

        <div class="login-card card">
            {{-- =====================================================
             CABEÇALHO
             ===================================================== --}}

            <div class="card-body p-4 p-md-5">

                {{-- Marca --}}
                <div class="text-center mb-4">
                    <div class="epas-logo">
                        e-PAS
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                        Bem-vindo ao e-PAS
                    </h1>

                    <p class="text-muted mb-0">
                        Sistema de agendamento de transporte de pacientes.
                    </p>

                </div>

                {{-- =================================================
                 MENSAGENS DE ERRO
                 ================================================= --}}

                @if ($errors->any())

                <div
                    class="alert alert-danger rounded-3 mb-4"
                    role="alert">

                    <div class="fw-bold mb-1">
                        Não foi possível entrar.
                    </div>

                    @foreach ($errors->all() as $e)

                    <div>
                        {{ $e }}
                    </div>

                    @endforeach

                </div>

                @endif

                {{-- =================================================
                 FORMULÁRIO
                 ================================================= --}}
                <form method="POST" action="/login">

                    @csrf

                    {{-- E-mail --}}
                    <div class="mb-4">

                        <label
                            for="email"
                            class="form-label fs-5">

                            E-mail

                        </label>

                        <input
                            type="email"
                            class="form-control form-control-lg"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            autocomplete="email"
                            required
                            autofocus>

                    </div>



                    {{-- Senha --}}
                    <div class="mb-2">

                        <label
                            for="senha"
                            class="form-label fs-5">

                            Senha

                        </label>

                        <input
                            type="password"
                            class="form-control form-control-lg"
                            id="senha"
                            name="password"
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                            required>

                    </div>



                    {{-- Recuperação --}}
                    <div class="text-end mb-4">

                        <a
                            href="#"
                            class="forgot-password"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEsqueciSenha">

                            Esqueci minha senha

                        </a>

                    </div>



                    {{-- Entrar --}}
                    <div class="d-grid mb-3">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg btn-login">

                            Entrar

                        </button>

                    </div>



                    {{-- Cadastro --}}
                    <div class="d-grid">

                        <a
                            href="/cadastro/pacientes"
                            class="btn btn-outline-primary btn-lg btn-register">

                            Criar minha conta

                        </a>

                    </div>

                </form>

            </div>



            {{-- =====================================================
             IDENTIDADE INSTITUCIONAL
             ===================================================== --}}

            <div class="card-footer bg-white border-0 public-service text-center px-4 py-4">

                <div class="small text-muted mb-1">
                    Serviço de transporte de pacientes
                </div>

                <div class="fw-semibold text-secondary">
                    Secretaria Municipal de Saúde de Rancharia
                </div>

                <div class="small text-muted mt-2">
                    Sistema e-PAS
                </div>

            </div>


        </div>

    </div>



    {{-- =========================================================
     MODAL: ESQUECI MINHA SENHA
     ========================================================= --}}

    <div
        class="modal fade"
        id="modalEsqueciSenha"
        tabindex="-1"
        aria-labelledby="modalEsqueciSenhaLabel"
        aria-hidden="true">

        <div
            class="modal-dialog modal-dialog-centered">

            <div
                class="modal-content border-0 shadow rounded-4">


                <div class="modal-header">

                    <h2
                        class="modal-title h5 fw-bold"
                        id="modalEsqueciSenhaLabel">

                        Esqueci minha senha

                    </h2>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Fechar">
                    </button>

                </div>


                <div class="modal-body p-4">

                    <p>
                        Se você não lembra sua senha, entre em contato com o
                        Setor de Agendamento de Transportes da Secretaria
                        Municipal de Saúde de Rancharia.
                    </p>


                    <div class="alert alert-primary rounded-3">

                        <div class="fw-semibold mb-2">
                            Como recuperar o acesso?
                        </div>

                        <div class="small">

                            A equipe responsável poderá orientar você sobre
                            a recuperação da sua conta por telefone, e-mail,
                            WhatsApp ou presencialmente.

                        </div>

                    </div>


                    <div class="mt-4">

                        <div class="fw-semibold mb-2">
                            Atendimento
                        </div>

                        <div class="text-muted">

                            Entre em contato com o Setor de Agendamento
                            de Transportes da Secretaria Municipal de Saúde
                            de Rancharia.

                        </div>

                    </div>


                    {{-- =================================================
                     FUTURO
                     =================================================
                     Quando a recuperação automática for implementada,
                     este conteúdo poderá ser substituído por um
                     formulário para envio do código/link de recuperação.
                     ================================================= --}}

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-primary px-4"
                        data-bs-dismiss="modal">

                        Entendi

                    </button>

                </div>


            </div>

        </div>

    </div>



    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</body>

</html>