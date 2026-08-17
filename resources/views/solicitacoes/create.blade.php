@extends('layout')

@section('conteudo')

<div class="container-fluid px-0">

    {{-- Cabeçalho --}}
    <div class="mb-4">

        <h1 class="fw-bold mb-2">
            Nova solicitação de transporte
        </h1>

        <p class="text-muted mb-0">
            Preencha as informações abaixo para solicitar seu transporte.
        </p>

    </div>


    {{-- Formulário --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            <form
                method="post"
                action="/solicitacoes"
                enctype="multipart/form-data">

                @csrf

                <input
                    type="hidden"
                    name="id_usuario"
                    value="{{ Auth::user()->id }}"/>


                {{-- =====================================================
                     DATA
                     ===================================================== --}}

                <div class="mb-4">

                    <label
                        for="data"
                        class="form-label fw-semibold fs-5">

                        Quando você precisa do transporte?

                    </label>

                    <div class="form-text mb-2">
                        Informe a data em que você precisa viajar.
                    </div>

                    <input
                        type="date"
                        id="data"
                        name="data"
                        class="form-control form-control-lg"
                        required>

                </div>


                {{-- =====================================================
                     CIDADE
                     ===================================================== --}}

                <div class="mb-4">

                    <label
                        for="cidade"
                        class="form-label fw-semibold fs-5">

                        Para qual cidade você precisa ir?

                    </label>

                    <div class="form-text mb-2">
                        Informe a cidade onde será realizado seu atendimento.
                    </div>

                    <input
                        type="text"
                        id="cidade"
                        name="cidade"
                        class="form-control form-control-lg"
                        placeholder="Ex.: Presidente Prudente"
                        autocomplete="address-level2"
                        required>

                </div>


                {{-- =====================================================
                     DESTINO
                     ===================================================== --}}

                <div class="mb-4">

                    <label
                        for="destino"
                        class="form-label fw-semibold fs-5">

                        Onde será sua consulta ou exame?

                    </label>

                    <div class="form-text mb-2">
                        Informe o nome do hospital, clínica, laboratório ou outro local.
                    </div>

                    <input
                        type="text"
                        id="destino"
                        name="destino"
                        class="form-control form-control-lg"
                        placeholder="Ex.: Hospital Regional"
                        required>

                </div>


                {{-- =====================================================
                     PONTO DE EMBARQUE
                     ===================================================== --}}

                <div class="mb-4">

                    <label
                        for="ponto"
                        class="form-label fw-semibold fs-5">

                        Onde você gostaria de embarcar?

                    </label>

                    <div class="form-text mb-2">
                        Escolha o ponto de embarque mais próximo de você.
                    </div>

                    <select
                        id="ponto"
                        name="ponto_id"
                        class="form-select form-select-lg"
                        required>

                        <option value="" selected disabled>
                            Selecione um ponto de embarque
                        </option>

                        @foreach ($pontos as $po)

                            <option value="{{ $po->id }}">
                                {{ $po->referencia }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- =====================================================
                     ACOMPANHANTE
                     ===================================================== --}}

                <div class="mb-4">

                    <div class="form-label fw-semibold fs-5 mb-1">
                        Você irá acompanhado?
                    </div>

                    <div class="form-text mb-3">
                        Se você precisar de um acompanhante, informe os dados abaixo.
                    </div>


                    <div class="mb-3">

                        <label
                            for="nome_acompanhante"
                            class="form-label">

                            Nome completo do acompanhante
                            <span class="text-muted">(opcional)</span>

                        </label>

                        <input
                            type="text"
                            id="nome_acompanhante"
                            name="nome_acompanhante"
                            class="form-control form-control-lg"
                            placeholder="Digite o nome completo"
                            autocomplete="name">

                    </div>


                    <div>

                        <label
                            for="cpf_acompanhante"
                            class="form-label">

                            CPF do acompanhante
                            <span class="text-muted">(opcional)</span>

                        </label>

                        <input
                            type="text"
                            id="cpf_acompanhante"
                            name="cpf_acompanhante"
                            class="form-control form-control-lg"
                            placeholder="Digite o CPF">

                    </div>

                </div>


                {{-- =====================================================
                     FOTO DO EXAME
                     ===================================================== --}}

                <div class="mb-4">

                    <label
                        for="foto"
                        class="form-label fw-semibold fs-5">

                        Comprovante da consulta ou exame

                    </label>

                    <div class="form-text mb-3">
                        Tire uma foto ou escolha uma foto do documento que comprove sua consulta ou exame.
                    </div>


                    <div
                        class="border rounded-4 bg-light p-4 text-center">

                        <div class="mb-3">

                            <div class="fw-semibold fs-5">
                                Adicionar foto
                            </div>

                            <div class="text-muted small mt-1">
                                Você pode tirar uma foto agora ou escolher uma foto do seu celular.
                            </div>

                        </div>


                        <label
                            for="foto"
                            class="btn btn-outline-primary btn-lg px-4">

                            Escolher foto

                        </label>


                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            class="d-none"
                            accept="image/*"
                            capture="environment"
                            required>


                        <div
                            id="nome-arquivo"
                            class="small text-muted mt-3">

                            Nenhuma foto selecionada.

                        </div>

                    </div>

                </div>


                {{-- Situação inicial --}}
                <input
                    type="hidden"
                    name="situacao"
                    value="Aguardando análise"/>


                {{-- =====================================================
                     AVISO
                     ===================================================== --}}

                <div class="alert alert-primary rounded-3 mb-4">

                    <div class="fw-semibold mb-1">
                        Depois de enviar
                    </div>

                    <div>
                        Sua solicitação será analisada pela equipe responsável.
                        Você poderá acompanhar a situação em
                        <strong>Solicitações</strong>.
                    </div>

                </div>


                {{-- =====================================================
                     BOTÃO
                     ===================================================== --}}

                <div class="d-grid">

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg py-3 fw-semibold">

                        Enviar solicitação

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
     SCRIPT PARA MOSTRAR O NOME DA FOTO SELECIONADA
     ========================================================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const inputFoto = document.getElementById('foto');
        const nomeArquivo = document.getElementById('nome-arquivo');

        if (inputFoto && nomeArquivo) {

            inputFoto.addEventListener('change', function () {

                if (this.files && this.files.length > 0) {

                    nomeArquivo.textContent =
                        'Foto selecionada: ' + this.files[0].name;

                } else {

                    nomeArquivo.textContent =
                        'Nenhuma foto selecionada.';

                }

            });

        }

    });

</script>

@endsection