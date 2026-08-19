@extends('layout')

@section('conteudo')

<style>
    .viagem-card {
        border: 0;
        border-radius: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .viagem-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.08) !important;
    }

    .viagem-card-principal {
        border-left: 5px solid var(--bs-primary);
    }

    .viagem-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .info-box {
        background-color: #f8f9fa;
        border-radius: 0.75rem;
        padding: 0.85rem 1rem;
        height: 100%;
    }

    .info-label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 0.15rem;
    }

    .info-value {
        font-weight: 600;
        font-size: 1rem;
    }

    .data-viagem {
        font-size: 1.15rem;
        font-weight: 700;
    }

    .btn-detalhes {
        min-height: 48px;
        font-weight: 600;
    }

    .passageiro-card {
        border: 1px solid #dee2e6;
        border-radius: 0.75rem;
    }

    .modal-content {
        border-radius: 1rem;
        overflow: hidden;
    }

    @media (max-width: 575.98px) {

        .titulo-pagina {
            font-size: 1.6rem;
        }

        .subtitulo-pagina {
            font-size: 1rem;
        }

        .viagem-card .card-body {
            padding: 1.1rem;
        }

        .data-viagem {
            font-size: 1.1rem;
        }

        .btn-detalhes {
            width: 100%;
        }

        .modal-dialog {
            margin: 0.75rem;
        }

        .modal-body {
            padding: 1rem;
        }
    }
</style>


{{-- =========================================================
     CABEÇALHO DA PÁGINA
     ========================================================= --}}

<div class="mb-4">

    <h1 class="titulo-pagina fw-bold text-primary mb-1">
        Minhas viagens
    </h1>

    <p class="subtitulo-pagina text-muted mb-0">
        Consulte suas próximas viagens e os passageiros.
    </p>

</div>


@if (session('sucesso'))

    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">

        {{ session('sucesso') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Fechar">
        </button>

    </div>

@endif


@if ($viagens->isEmpty())

    {{-- =====================================================
         NENHUMA VIAGEM
         ===================================================== --}}

    <div class="card viagem-card shadow-sm">

        <div class="card-body text-center py-5">

            <div class="viagem-icon bg-primary-subtle text-primary mx-auto mb-3">
                🚐
            </div>

            <h4 class="fw-bold mb-2">
                Nenhuma viagem cadastrada
            </h4>

            <p class="text-muted mb-0">
                No momento, você não possui viagens vinculadas ao seu cadastro.
            </p>

        </div>

    </div>


@else


    {{-- =====================================================
         VIAGENS
         ===================================================== --}}

    <div class="d-flex flex-column gap-3">

        @foreach ($viagens as $v)

            @php
                $dias = [];

                if ($v->domingo) $dias[] = 'Domingo';
                if ($v->segunda) $dias[] = 'Segunda-feira';
                if ($v->terca) $dias[] = 'Terça-feira';
                if ($v->quarta) $dias[] = 'Quarta-feira';
                if ($v->quinta) $dias[] = 'Quinta-feira';
                if ($v->sexta) $dias[] = 'Sexta-feira';
                if ($v->sabado) $dias[] = 'Sábado';

                $passageiros = $solicitacoes->where('viagem_id', $v->id);

                $dataFormatada = '---';

                if ($v->data) {
                    try {
                        $dataFormatada = \Carbon\Carbon::parse($v->data)->format('d/m/Y');
                    } catch (\Exception $e) {
                        $dataFormatada = $v->data;
                    }
                }
            @endphp


            {{-- =================================================
                 CARD DA VIAGEM
                 ================================================= --}}

            <div class="card viagem-card shadow-sm
                {{ $loop->first ? 'viagem-card-principal' : '' }}">

                <div class="card-body">


                    {{-- Cabeçalho do card --}}

                    <div class="d-flex align-items-start gap-3 mb-3">

                        <div class="viagem-icon bg-primary-subtle text-primary">
                            🚐
                        </div>

                        <div class="flex-grow-1">

                            <div class="d-flex flex-column flex-md-row
                                        justify-content-md-between
                                        align-items-md-start
                                        gap-2">

                                <div>

                                    @if($loop->first)

                                        <span class="badge bg-primary mb-1">
                                            Próxima viagem
                                        </span>

                                    @endif

                                    <h4 class="fw-bold mb-1">
                                        {{ $v->cidade->nome ?? 'Destino não informado' }}
                                    </h4>

                                    <div class="data-viagem text-dark">
                                        {{ $dataFormatada }}
                                    </div>

                                </div>

                                @if($v->tipo_viagem)

                                    <span class="badge bg-secondary align-self-start">
                                        Viagem diária
                                    </span>

                                @else

                                    <span class="badge bg-secondary align-self-start">
                                        Viagem esporádica
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Informações principais --}}

                    <div class="row g-2 mb-3">

                        <div class="col-12 col-sm-4">

                            <div class="info-box">

                                <span class="info-label">
                                    Embarque
                                </span>

                                <span class="info-value">
                                    {{ $v->horario_embarque ?? '---' }}
                                </span>

                            </div>

                        </div>


                        <div class="col-12 col-sm-4">

                            <div class="info-box">

                                <span class="info-label">
                                    Saída
                                </span>

                                <span class="info-value">
                                    {{ $v->horario_saida ?? '---' }}
                                </span>

                            </div>

                        </div>


                        <div class="col-12 col-sm-4">

                            <div class="info-box">

                                <span class="info-label">
                                    Chegada prevista
                                </span>

                                <span class="info-value">
                                    {{ $v->horario_chegada ?? '---' }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Resumo da viagem --}}

                    <div class="d-flex flex-column flex-md-row
                                justify-content-between
                                gap-2
                                mb-3">

                        <div class="text-muted">

                            <strong class="text-dark">
                                {{ $passageiros->count() }}
                            </strong>

                            {{ $passageiros->count() == 1 ? 'passageiro' : 'passageiros' }}

                        </div>


                        @if($v->veiculo)

                            <div class="text-muted">

                                <strong class="text-dark">
                                    {{ $v->veiculo->placa ?? '---' }}
                                </strong>

                                @if($v->veiculo->modelo)
                                    — {{ $v->veiculo->modelo }}
                                @endif

                            </div>

                        @endif

                    </div>


                    {{-- Botão --}}

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-detalhes"
                        data-bs-toggle="modal"
                        data-bs-target="#modalViagem{{ $v->id }}">

                        Ver detalhes da viagem

                    </button>

                </div>

            </div>


        @endforeach

    </div>


    {{-- =====================================================
         MODAIS DE DETALHES
         ===================================================== --}}

    @foreach ($viagens as $v)

        @php
            $dias = [];

            if ($v->domingo) $dias[] = 'Domingo';
            if ($v->segunda) $dias[] = 'Segunda-feira';
            if ($v->terca) $dias[] = 'Terça-feira';
            if ($v->quarta) $dias[] = 'Quarta-feira';
            if ($v->quinta) $dias[] = 'Quinta-feira';
            if ($v->sexta) $dias[] = 'Sexta-feira';
            if ($v->sabado) $dias[] = 'Sábado';

            $passageiros = $solicitacoes->where('viagem_id', $v->id);
        @endphp


        <div class="modal fade"
             id="modalViagem{{ $v->id }}"
             tabindex="-1"
             aria-labelledby="viagemLabel{{ $v->id }}"
             aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content shadow border-0">


                    {{-- Cabeçalho --}}

                    <div class="modal-header bg-primary text-white">

                        <div>

                            <h5 class="modal-title fw-bold"
                                id="viagemLabel{{ $v->id }}">

                                Detalhes da viagem

                            </h5>

                            <small class="opacity-75">

                                {{ $v->cidade->nome ?? 'Destino não informado' }}

                            </small>

                        </div>

                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Fechar">
                        </button>

                    </div>


                    {{-- Corpo --}}

                    <div class="modal-body">


                        {{-- =====================================
                             INFORMAÇÕES DA VIAGEM
                             ===================================== --}}

                        <h6 class="fw-bold text-primary mb-3">
                            Informações da viagem
                        </h6>


                        <div class="row g-2 mb-4">

                            <div class="col-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-label">
                                        Cidade de destino
                                    </span>

                                    <span class="info-value">
                                        {{ $v->cidade->nome ?? '---' }}
                                    </span>

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-label">
                                        Data
                                    </span>

                                    <span class="info-value">

                                        @if($v->data)

                                            {{ \Carbon\Carbon::parse($v->data)->format('d/m/Y') }}

                                        @else

                                            ---

                                        @endif

                                    </span>

                                </div>

                            </div>


                            <div class="col-12">

                                <div class="info-box">

                                    <span class="info-label">
                                        Dias da semana
                                    </span>

                                    @if(count($dias) > 0)

                                        <div class="mt-1">

                                            @foreach ($dias as $dia)

                                                <span class="badge bg-secondary me-1 mb-1">
                                                    {{ $dia }}
                                                </span>

                                            @endforeach

                                        </div>

                                    @else

                                        <span class="info-value">
                                            ---
                                        </span>

                                    @endif

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-label">
                                        Motorista
                                    </span>

                                    <span class="info-value">
                                        {{ $v->motorista->nome ?? '---' }}
                                    </span>

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-label">
                                        Veículo
                                    </span>

                                    <span class="info-value">

                                        {{ $v->veiculo->placa ?? '---' }}

                                        @if($v->veiculo->modelo)
                                            — {{ $v->veiculo->modelo }}
                                        @endif

                                    </span>

                                </div>

                            </div>


                            <div class="col-12 col-md-4">

                                <div class="info-box">

                                    <span class="info-label">
                                        Embarque
                                    </span>

                                    <span class="info-value">
                                        {{ $v->horario_embarque ?? '---' }}
                                    </span>

                                </div>

                            </div>


                            <div class="col-12 col-md-4">

                                <div class="info-box">

                                    <span class="info-label">
                                        Saída
                                    </span>

                                    <span class="info-value">
                                        {{ $v->horario_saida ?? '---' }}
                                    </span>

                                </div>

                            </div>


                            <div class="col-12 col-md-4">

                                <div class="info-box">

                                    <span class="info-label">
                                        Chegada prevista
                                    </span>

                                    <span class="info-value">
                                        {{ $v->horario_chegada ?? '---' }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- =====================================
                             PASSAGEIROS
                             ===================================== --}}

                        <div class="d-flex justify-content-between
                                    align-items-center mb-3">

                            <h6 class="fw-bold text-primary mb-0">
                                Passageiros
                            </h6>

                            <span class="badge bg-primary">
                                {{ $passageiros->count() }}
                            </span>

                        </div>


                        @if($passageiros->isEmpty())

                            <div class="alert alert-light border text-muted">
                                Nenhum passageiro está vinculado a esta viagem.
                            </div>

                        @else

                            <div class="d-flex flex-column gap-2">

                                @foreach ($passageiros as $s)

                                    @php

                                        $data_nasc = null;

                                        if ($s->paciente && $s->paciente->dataNasc) {

                                            try {

                                                $data_nasc = \Carbon\Carbon::parse(
                                                    $s->paciente->dataNasc
                                                )->format('d/m/Y');

                                            } catch (\Exception $e) {

                                                $data_nasc = $s->paciente->dataNasc;

                                            }

                                        }

                                    @endphp


                                    <div class="passageiro-card p-3">

                                        <div class="d-flex align-items-start gap-3">

                                            <div class="viagem-icon bg-secondary-subtle text-secondary">

                                                {{ strtoupper(substr($s->paciente->nome ?? 'P', 0, 1)) }}

                                            </div>


                                            <div class="flex-grow-1">

                                                <h6 class="fw-bold mb-2">

                                                    {{ $s->paciente->nome ?? 'Paciente não informado' }}

                                                </h6>


                                                <div class="row g-2 small">

                                                    <div class="col-12 col-md-6">

                                                        <span class="text-muted">
                                                            Data de nascimento:
                                                        </span>

                                                        <strong>
                                                            {{ $data_nasc ?? '---' }}
                                                        </strong>

                                                    </div>


                                                    <div class="col-12 col-md-6">

                                                        <span class="text-muted">
                                                            Acompanhante:
                                                        </span>

                                                        <strong>
                                                            {{ $s->nome_acompanhante ?? 'Nenhum' }}
                                                        </strong>

                                                    </div>


                                                    <div class="col-12">

                                                        <span class="text-muted">
                                                            Ponto de embarque:
                                                        </span>

                                                        <strong>
                                                            {{ $s->ponto->referencia ?? '---' }}
                                                        </strong>

                                                    </div>


                                                    <div class="col-12">

                                                        <span class="text-muted">
                                                            Destino:
                                                        </span>

                                                        <strong>
                                                            {{ $s->destino ?? '---' }}
                                                        </strong>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @endif


                        {{-- =====================================
                             ÚLTIMA ATUALIZAÇÃO
                             ===================================== --}}

                        <div class="mt-4 pt-3 border-top">

                            <small class="text-muted">

                                <strong>
                                    Última atualização:
                                </strong>

                                {{ $v->updated_at->format('d/m/Y H:i') }}

                            </small>

                        </div>

                    </div>


                    {{-- Rodapé --}}

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-primary btn-detalhes"
                                data-bs-dismiss="modal">

                            Fechar

                        </button>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

@endif

@endsection