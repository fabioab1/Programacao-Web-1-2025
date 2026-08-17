@extends('layout')

@section('conteudo')

<div class="container-fluid px-0">

    {{-- Cabeçalho da página --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h1 class="fw-bold mb-1">Suas solicitações</h1>
            <p class="text-muted mb-0">
                Consulte o andamento das suas solicitações de transporte.
            </p>
        </div>

        <div>
            <a href="/solicitacoes/create" class="btn btn-primary btn-lg px-4">
                Nova solicitação
            </a>
        </div>

    </div>


    {{-- Mensagens do sistema --}}
    @if (session('erro'))
        <div class="alert alert-danger d-flex align-items-start gap-2 mb-4" role="alert">
            <div>
                <strong>Não foi possível concluir a operação.</strong>
                <div>{{ session('erro') }}</div>
            </div>
        </div>
    @endif

    @if (session('sucesso'))
        <div class="alert alert-success d-flex align-items-start gap-2 mb-4" role="alert">
            <div>
                <strong>Operação realizada com sucesso!</strong>
                <div>{{ session('sucesso') }}</div>
            </div>
        </div>
    @endif


    {{-- Cabeçalho da seção --}}
    <div class="mb-3">
        <h2 class="h4 fw-bold mb-1">Registro de solicitações</h2>
        <p class="text-muted mb-0">
            Veja abaixo suas solicitações de transporte.
        </p>
    </div>


    {{-- Lista de solicitações --}}
    <div class="row g-4">

        @foreach ($solicitacoes as $s)

            @if ($s->id_usuario == Auth::user()->id)

                @php
                    $desativar = in_array($s->situacao, [
                        "Aguardando análise",
                        "Solicitação aceita"
                    ]);
                @endphp

                <div class="col-12 col-lg-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        {{-- Cabeçalho do card --}}
                        <div class="card-body p-4">

                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-start gap-3 mb-4">

                                <div>
                                    <span class="text-muted small d-block mb-1">
                                        Data da viagem
                                    </span>

                                    <div class="fw-bold fs-5">
                                        {{ $s->data }}
                                    </div>
                                </div>


                                {{-- Situação --}}
                                <div>
                                    @if ($s->situacao == "Solicitação recusada")

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-danger rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalRecusada-{{ $s->id }}">
                                            Solicitação recusada
                                        </button>

                                    @elseif ($s->situacao == "Solicitação aceita")

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-success rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalAceita-{{ $s->id }}">
                                            Solicitação aceita
                                        </button>

                                    @elseif ($s->situacao == "Aguardando análise")

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-primary rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalAguardando-{{ $s->id }}">
                                            Aguardando análise
                                        </button>

                                    @endif
                                </div>

                            </div>


                            {{-- Destino --}}
                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Cidade de destino
                                </div>

                                <div class="fw-semibold fs-5">
                                    {{ $s->cidade }}
                                </div>

                                @if ($s->destino)
                                    <div class="text-muted mt-1">
                                        {{ $s->destino }}
                                    </div>
                                @endif

                            </div>


                            {{-- Informações principais --}}
                            <div class="row g-3 mb-4">

                                <div class="col-12">

                                    <div class="bg-light rounded-3 p-3">

                                        <div class="text-muted small mb-1">
                                            Ponto de embarque
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $s->ponto->referencia ?? 'Não informado' }}
                                        </div>

                                    </div>

                                </div>


                                @if ($s->nome_acompanhante)

                                    <div class="col-12 col-sm-6">

                                        <div class="bg-light rounded-3 p-3 h-100">

                                            <div class="text-muted small mb-1">
                                                Acompanhante
                                            </div>

                                            <div class="fw-semibold">
                                                {{ $s->nome_acompanhante }}
                                            </div>

                                        </div>

                                    </div>

                                @endif


                                @if ($s->foto)

                                    <div class="col-12 col-sm-6">

                                        <div class="bg-light rounded-3 p-3 h-100">

                                            <div class="text-muted small mb-2">
                                                Documento do exame
                                            </div>

                                            <a
                                                href="{{ asset('storage/'.$s->foto) }}"
                                                target="_blank"
                                                class="btn btn-outline-secondary btn-sm w-100">
                                                Visualizar documento
                                            </a>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            {{-- Motivo da recusa --}}
                            @if ($s->situacao == "Solicitação recusada")

                                <div class="alert alert-danger rounded-3 mb-4">

                                    <div class="fw-bold mb-1">
                                        Motivo da recusa
                                    </div>

                                    <div>
                                        {{ $s->motivo ?? 'Não informado.' }}
                                    </div>

                                    <div class="mt-2">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalRecusada-{{ $s->id }}">
                                            Ver detalhes
                                        </button>
                                    </div>

                                </div>

                            @endif


                            {{-- Rodapé / ações --}}
                            <div class="border-top pt-3">

                                <div class="d-flex flex-column flex-sm-row gap-2">

                                    <a
                                        href="{{ $desativar ? '#' : '/solicitacoes/' . $s->id . '/edit' }}"
                                        class="btn btn-warning flex-fill {{ $desativar ? 'disabled' : '' }}"
                                        title="Editar"
                                        {{ $desativar ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                        Editar solicitação
                                    </a>

                                    <a
                                        href="/solicitacoes/{{ $s->id }}"
                                        class="btn btn-outline-primary flex-fill">
                                        Consultar solicitação
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- MODAL: SOLICITAÇÃO RECUSADA --}}
                {{-- ===================================================== --}}

                <div
                    class="modal fade"
                    id="modalRecusada-{{ $s->id }}"
                    tabindex="-1"
                    aria-labelledby="recusadaLabel-{{ $s->id }}"
                    aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content border-0 shadow rounded-4">

                            <div class="modal-header bg-danger text-white">

                                <h5
                                    class="modal-title fw-bold"
                                    id="recusadaLabel-{{ $s->id }}">
                                    Solicitação recusada
                                </h5>

                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Fechar">
                                </button>

                            </div>


                            <div class="modal-body p-4">

                                <div class="alert alert-danger rounded-3">

                                    <div class="fw-bold mb-2">
                                        Motivo da recusa
                                    </div>

                                    <div>
                                        {{ $s->motivo ?? 'Não informado.' }}
                                    </div>

                                </div>

                                <div class="text-muted small">
                                    Última atualização:
                                    {{ $s->updated_at->format('d/m/Y H:i') }}
                                </div>

                            </div>


                            <div class="modal-footer flex-column flex-sm-row">

                                <form
                                    method="post"
                                    action="/solicitacoes/reenviar/{{ $s->id }}"
                                    class="w-100 w-sm-auto">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        type="submit"
                                        class="btn btn-primary w-100">
                                        Reenviar solicitação
                                    </button>

                                </form>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary w-100 w-sm-auto"
                                    data-bs-dismiss="modal">
                                    Fechar
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- MODAL: SOLICITAÇÃO ACEITA --}}
                {{-- ===================================================== --}}

                <div
                    class="modal fade"
                    id="modalAceita-{{ $s->id }}"
                    tabindex="-1"
                    aria-labelledby="aceitaLabel-{{ $s->id }}"
                    aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content border-0 shadow rounded-4">

                            <div class="modal-header bg-success text-white">

                                <h5
                                    class="modal-title fw-bold"
                                    id="aceitaLabel-{{ $s->id }}">
                                    Solicitação aceita
                                </h5>

                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Fechar">
                                </button>

                            </div>


                            <div class="modal-body p-4">

                                @php
                                    $v = $s->viagem;
                                    $dias = [];

                                    if ($v) {
                                        if($v->domingo) $dias[] = 'Domingo';
                                        if($v->segunda) $dias[] = 'Segunda-feira';
                                        if($v->terca) $dias[] = 'Terça-feira';
                                        if($v->quarta) $dias[] = 'Quarta-feira';
                                        if($v->quinta) $dias[] = 'Quinta-feira';
                                        if($v->sexta) $dias[] = 'Sexta-feira';
                                        if($v->sabado) $dias[] = 'Sábado';
                                    }
                                @endphp


                                <div class="alert alert-success rounded-3 mb-4">

                                    <div class="fw-bold mb-1">
                                        Seu transporte foi confirmado.
                                    </div>

                                    <div>
                                        Confira abaixo as informações da viagem.
                                    </div>

                                </div>


                                <div class="list-group">

                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Cidade de destino
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->cidade->nome ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">

                                        <div class="text-muted small mb-2">
                                            Dias da semana
                                        </div>

                                        @if (count($dias) > 0)

                                            @foreach ($dias as $dia)

                                                <span class="badge bg-secondary me-1 mb-1">
                                                    {{ $dia }}
                                                </span>

                                            @endforeach

                                        @else
                                            ---
                                        @endif

                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Data da viagem
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->data ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Motorista
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->motorista->nome ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Veículo
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->veiculo->placa ?? '---' }}
                                            -
                                            {{ $v->veiculo->modelo ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Horário de embarque
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->horario_embarque ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Horário de saída
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->horario_saida ?? '---' }}
                                        </div>
                                    </div>


                                    <div class="list-group-item py-3">
                                        <div class="text-muted small">
                                            Horário estimado de chegada
                                        </div>
                                        <div class="fw-semibold">
                                            {{ $v->horario_chegada ?? '---' }}
                                        </div>
                                    </div>

                                </div>


                                <div class="text-muted small mt-4">
                                    Última atualização:
                                    {{ $s->updated_at->format('d/m/Y H:i') }}
                                </div>

                            </div>


                            <div class="modal-footer">

                                <button
                                    type="button"
                                    class="btn btn-outline-success px-4"
                                    data-bs-dismiss="modal">
                                    Fechar
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- MODAL: AGUARDANDO ANÁLISE --}}
                {{-- ===================================================== --}}

                <div
                    class="modal fade"
                    id="modalAguardando-{{ $s->id }}"
                    tabindex="-1"
                    aria-labelledby="aguardandoLabel-{{ $s->id }}"
                    aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content border-0 shadow rounded-4">

                            <div class="modal-header bg-primary text-white">

                                <h5
                                    class="modal-title fw-bold"
                                    id="aguardandoLabel-{{ $s->id }}">
                                    Aguardando análise
                                </h5>

                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Fechar">
                                </button>

                            </div>


                            <div class="modal-body p-4">

                                <div class="alert alert-primary rounded-3">

                                    <div class="fw-bold mb-1">
                                        Solicitação enviada!
                                    </div>

                                    <div>
                                        Sua solicitação foi recebida e está aguardando a análise de um administrador.
                                    </div>

                                </div>


                                <div class="text-muted small">
                                    Enviada em:
                                    {{ $s->updated_at->format('d/m/Y H:i') }}
                                </div>

                            </div>


                            <div class="modal-footer">

                                <button
                                    type="button"
                                    class="btn btn-outline-primary px-4"
                                    data-bs-dismiss="modal">
                                    Fechar
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        @endforeach

    </div>


    {{-- Estado sem solicitações --}}
    @if ($solicitacoes->where('id_usuario', Auth::user()->id)->count() === 0)

        <div class="card border-0 shadow-sm rounded-4 mt-3">

            <div class="card-body text-center py-5 px-4">

                <h3 class="h5 fw-bold mb-2">
                    Você ainda não possui solicitações
                </h3>

                <p class="text-muted mb-4">
                    Quando você solicitar um transporte, suas solicitações aparecerão aqui.
                </p>

                <a
                    href="/solicitacoes/create"
                    class="btn btn-primary btn-lg px-4">
                    Fazer uma solicitação
                </a>

            </div>

        </div>

    @endif

</div>

@endsection