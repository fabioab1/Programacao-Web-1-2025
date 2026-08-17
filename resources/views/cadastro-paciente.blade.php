@extends('layout')

@section('conteudo')

<div class="container-fluid px-0">

    {{-- =====================================================
         CABEÇALHO
         ===================================================== --}}

    <div class="mb-4">

        <h1 class="fw-bold mb-2">
            Crie sua conta no e-PAS
        </h1>

        <p class="text-muted mb-0">
            Preencha seus dados para poder solicitar o transporte de pacientes.
        </p>

    </div>


    {{-- =====================================================
         CARD PRINCIPAL
         ===================================================== --}}

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            {{-- =================================================
                 INDICADOR DE ETAPAS
                 ================================================= --}}

            <div class="mb-4">

                <div class="d-flex justify-content-between align-items-center mb-2">

                    <span
                        id="etapaTexto"
                        class="fw-semibold">

                        Etapa 1 de 3

                    </span>

                    <span
                        id="etapaTitulo"
                        class="text-muted">

                        Seus dados

                    </span>

                </div>


                <div
                    class="progress"
                    style="height: 8px;">

                    <div
                        id="barraProgresso"
                        class="progress-bar"
                        role="progressbar"
                        style="width: 33.33%;"
                        aria-valuenow="33"
                        aria-valuemin="0"
                        aria-valuemax="100">
                    </div>

                </div>

            </div>


            {{-- =================================================
                 MENSAGEM DE ERRO
                 ================================================= --}}

            @if (session('erro'))

                <div
                    class="alert alert-danger rounded-3"
                    role="alert">

                    {{ session('erro') }}

                </div>

            @endif


            {{-- =================================================
                 FORMULÁRIO
                 ================================================= --}}

            <form
                method="post"
                action="/cadastro/pacientes/store"
                id="formCadastro">

                @csrf


                {{-- =================================================
                     ETAPA 1 — DADOS PESSOAIS
                     ================================================= --}}

                <div
                    class="etapa"
                    id="etapa1">

                    <div class="mb-4">

                        <h2 class="h4 fw-bold mb-2">
                            Vamos começar pelos seus dados
                        </h2>

                        <p class="text-muted mb-0">
                            Informe seus dados pessoais exatamente como aparecem
                            nos seus documentos.
                        </p>

                    </div>


                    {{-- Nome --}}
                    <div class="mb-4">

                        <label
                            for="nome"
                            class="form-label fs-5 fw-semibold">

                            Qual é o seu nome completo?

                        </label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            class="form-control form-control-lg"
                            placeholder="Digite seu nome completo"
                            autocomplete="name"
                            required>

                    </div>


                    {{-- Data de nascimento --}}
                    <div class="mb-4">

                        <label
                            for="dataNasc"
                            class="form-label fs-5 fw-semibold">

                            Qual é a sua data de nascimento?

                        </label>

                        <input
                            type="date"
                            id="dataNasc"
                            name="dataNasc"
                            class="form-control form-control-lg"
                            autocomplete="bday"
                            required>

                    </div>


                    {{-- CNS --}}
                    <div class="mb-4">

                        <label
                            for="cns"
                            class="form-label fs-5 fw-semibold">

                            Qual é o número do seu Cartão SUS?

                        </label>

                        <div class="form-text mb-2">
                            Esse número também é chamado de Cartão Nacional de Saúde (CNS).
                        </div>

                        <input
                            type="text"
                            id="cns"
                            name="cns"
                            class="form-control form-control-lg"
                            placeholder="Digite o número do seu Cartão SUS"
                            inputmode="numeric"
                            required>

                    </div>


                    {{-- CPF --}}
                    <div class="mb-4">

                        <label
                            for="cpf"
                            class="form-label fs-5 fw-semibold">

                            Qual é o seu CPF?

                        </label>

                        <input
                            type="text"
                            id="cpf"
                            name="cpf"
                            class="form-control form-control-lg"
                            placeholder="Digite seu CPF"
                            inputmode="numeric"
                            autocomplete="off"
                            required>

                    </div>


                    <div class="d-grid">

                        <button
                            type="button"
                            class="btn btn-primary btn-lg py-3 fw-semibold"
                            onclick="proximaEtapa(2)">

                            Continuar

                        </button>

                    </div>

                </div>


                {{-- =================================================
                     ETAPA 2 — CONTATO
                     ================================================= --}}

                <div
                    class="etapa d-none"
                    id="etapa2">

                    <div class="mb-4">

                        <h2 class="h4 fw-bold mb-2">
                            Como podemos entrar em contato?
                        </h2>

                        <p class="text-muted mb-0">
                            Informe um celular e um e-mail que você utiliza.
                        </p>

                    </div>


                    {{-- Celular --}}
                    <div class="mb-4">

                        <label
                            for="celular"
                            class="form-label fs-5 fw-semibold">

                            Qual é o seu número de celular?

                        </label>

                        <div class="form-text mb-2">
                            Use um número que você possa consultar.
                        </div>

                        <input
                            type="tel"
                            id="celular"
                            name="celular"
                            class="form-control form-control-lg"
                            placeholder="Digite seu número de celular"
                            inputmode="tel"
                            autocomplete="tel"
                            required>

                    </div>


                    {{-- E-mail --}}
                    <div class="mb-4">

                        <label
                            for="email"
                            class="form-label fs-5 fw-semibold">

                            Qual é o seu e-mail?

                        </label>

                        <div class="form-text mb-2">
                            Você usará este e-mail para entrar no e-PAS.
                        </div>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control form-control-lg"
                            placeholder="Digite seu endereço de e-mail"
                            autocomplete="email"
                            required>

                    </div>


                    <div class="d-grid gap-2">

                        <button
                            type="button"
                            class="btn btn-primary btn-lg py-3 fw-semibold"
                            onclick="proximaEtapa(3)">

                            Continuar

                        </button>

                        <button
                            type="button"
                            class="btn btn-outline-secondary btn-lg py-3"
                            onclick="voltarEtapa(1)">

                            Voltar

                        </button>

                    </div>

                </div>


                {{-- =================================================
                     ETAPA 3 — ENDEREÇO E SENHA
                     ================================================= --}}

                <div
                    class="etapa d-none"
                    id="etapa3">

                    <div class="mb-4">

                        <h2 class="h4 fw-bold mb-2">
                            Quase tudo pronto!
                        </h2>

                        <p class="text-muted mb-0">
                            Informe seu endereço e crie uma senha para acessar sua conta.
                        </p>

                    </div>


                    {{-- Logradouro --}}
                    <div class="mb-4">

                        <label
                            for="logradouro"
                            class="form-label fs-5 fw-semibold">

                            Qual é o nome da sua rua ou avenida?

                        </label>

                        <input
                            type="text"
                            id="logradouro"
                            name="logradouro"
                            class="form-control form-control-lg"
                            placeholder="Digite o nome da rua ou avenida"
                            autocomplete="street-address"
                            required>

                    </div>


                    {{-- Número --}}
                    <div class="mb-4">

                        <label
                            for="numero"
                            class="form-label fs-5 fw-semibold">

                            Qual é o número da sua residência?

                        </label>

                        <input
                            type="number"
                            id="numero"
                            name="numero"
                            class="form-control form-control-lg"
                            placeholder="Digite o número"
                            inputmode="numeric"
                            required>

                    </div>


                    {{-- Bairro --}}
                    <div class="mb-4">

                        <label
                            for="bairro"
                            class="form-label fs-5 fw-semibold">

                            Em qual bairro você mora?

                        </label>

                        <input
                            type="text"
                            id="bairro"
                            name="bairro"
                            class="form-control form-control-lg"
                            placeholder="Digite o nome do bairro"
                            autocomplete="address-level3"
                            required>

                    </div>


                    {{-- Cidade --}}
                    <div class="mb-4">

                        <label
                            for="cidade"
                            class="form-label fs-5 fw-semibold">

                            Em qual cidade você mora?

                        </label>

                        <input
                            type="text"
                            id="cidade"
                            name="cidade"
                            class="form-control form-control-lg"
                            placeholder="Digite o nome da cidade"
                            autocomplete="address-level2"
                            required>

                    </div>


                    {{-- Senha --}}
                    <div class="mb-4">

                        <label
                            for="password"
                            class="form-label fs-5 fw-semibold">

                            Crie uma senha para sua conta

                        </label>

                        <div class="form-text mb-2">
                            Escolha uma senha que você consiga lembrar e não compartilhe com outras pessoas.
                        </div>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control form-control-lg"
                            placeholder="Digite sua nova senha"
                            autocomplete="new-password"
                            required>

                    </div>


                    {{-- Aviso --}}
                    <div
                        class="alert alert-primary rounded-3 mb-4">

                        <div class="fw-semibold mb-1">
                            Seus dados estão quase completos.
                        </div>

                        <div>
                            Confira as informações antes de criar sua conta.
                        </div>

                    </div>


                    {{-- Botões --}}
                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg py-3 fw-semibold">

                            Criar minha conta

                        </button>

                        <button
                            type="button"
                            class="btn btn-outline-secondary btn-lg py-3"
                            onclick="voltarEtapa(2)">

                            Voltar

                        </button>

                    </div>

                </div>

            </form>


            {{-- =================================================
                 VOLTAR PARA LOGIN
                 ================================================= --}}

            <div class="text-center mt-4 pt-3 border-top">

                <span class="text-muted">
                    Já possui uma conta?
                </span>

                <a
                    href="/login"
                    class="fw-semibold text-decoration-none">

                    Entrar no e-PAS

                </a>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT DAS ETAPAS
     ========================================================= --}}

<script>

    function proximaEtapa(numero) {

        const etapaAtual = numero - 1;

        const campos = document
            .querySelectorAll('#etapa' + etapaAtual + ' [required]');

        let valido = true;

        campos.forEach(function (campo) {

            if (!campo.checkValidity()) {

                campo.reportValidity();

                valido = false;

            }

        });

        if (!valido) {
            return;
        }

        mostrarEtapa(numero);
    }


    function voltarEtapa(numero) {

        mostrarEtapa(numero);

    }


    function mostrarEtapa(numero) {

        document
            .querySelectorAll('.etapa')
            .forEach(function (etapa) {

                etapa.classList.add('d-none');

            });


        document
            .getElementById('etapa' + numero)
            .classList.remove('d-none');


        const titulos = {

            1: 'Seus dados',

            2: 'Seus contatos',

            3: 'Endereço e senha'

        };


        const progresso = {

            1: 33.33,

            2: 66.66,

            3: 100

        };


        document
            .getElementById('etapaTexto')
            .textContent = 'Etapa ' + numero + ' de 3';


        document
            .getElementById('etapaTitulo')
            .textContent = titulos[numero];


        const barra =
            document.getElementById('barraProgresso');


        barra.style.width =
            progresso[numero] + '%';


        barra.setAttribute(
            'aria-valuenow',
            progresso[numero]
        );


        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    }

</script>

@endsection