@extends('layout')

@section('conteudo')

<h1>Suas solicitações</h1>

<a class="btn btn-primary mb-3" href="/solicitacoes/create">Nova solicitação</a>

@if (session('erro'))
<div class="alert alert-danger">
    {{ session('erro') }}
</div>
@endif

@if (session('sucesso'))
<div class="alert alert-success">
    {{ session('sucesso') }}
</div>
@endif

<h2>Registro de solicitações</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Data da viagem</th>
            <th>Cidade</th>
            <th>Destino</th>
            <th>Ponto de embarque</th>
            <th>Nome do acompanhante</th>
            <th>CPF do acompanhante</th>
            <th>Situação</th>
            <th>Foto do exame</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitacoes as $s)

            @if ($s->id_usuario == Auth::user()->id)
                <tr>
                    <td>{{ $s->data }}</td>
                    <td>{{ $s->cidade }}</td>
                    <td>{{ $s->destino }}</td>
                    <td>{{ $s->ponto->referencia }}</td>
                    <td>{{ isset($s->nome_acompanhante) ? "$s->nome_acompanhante" : "" }}</td>
                    <td>{{ isset($s->cpf_acompanhante) ? "$s->cpf_acompanhante" : "" }}</td>
                    <td>
                        @if ($s->situacao == "Solicitação recusada")
                            <a href="#" class="link-danger" data-bs-toggle="modal" data-bs-target="#modalRecusada-{{ $s->id }}">
                                Solicitação recusada
                            </a>
                        @elseif ($s->situacao == "Solicitação aceita")
                            <a href="#" class="link-success" data-bs-toggle="modal" data-bs-target="#modalAceita-{{ $s->id }}">
                                Solicitação aceita
                            </a>
                        @elseif ($s->situacao == "Aguardando análise")
                            <a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalAguardando-{{ $s->id }}">
                                Aguardando análise
                            </a>
                        @endif
                    </td>
                    <td> <img src="{{ asset('storage/'.$s->foto) }}" height="50"/> </td>
                    <td>
                        <div class="btn-group" role="group">
                            @php
                                $desativar = in_array($s->situacao, ["Aguardando análise", "Solicitação aceita"]);
                            @endphp

                            <a href="{{ $desativar ? '#' : '/solicitacoes/' . $s->id . '/edit' }}"
                            class="btn btn-sm btn-warning {{ $desativar ? 'disabled' : '' }}"
                            title="Editar"
                            {{ $desativar ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                Editar
                            </a>

                            <a href="/solicitacoes/{{ $s->id }}"
                            class="btn btn-sm btn-info"
                            title="Consultar">
                                Consultar
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Modal: Recusada -->
                <div class="modal fade" id="modalRecusada-{{ $s->id }}" tabindex="-1" aria-labelledby="recusadaLabel-{{ $s->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-danger shadow">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="recusadaLabel-{{ $s->id }}">Solicitação recusada</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Motivo:</strong></p>
                        <p class="text-muted">{{ $s->motivo ?? 'Não informado.' }}</p>
                        <hr>
                        <p><strong>Última atualização:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="/solicitacoes/reenviar/{{ $s->id }}">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-outline-secondary">Reenviar</button>

                        </form>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal: Aceita -->
                <div class="modal fade" id="modalAceita-{{ $s->id }}" tabindex="-1" aria-labelledby="aceitaLabel-{{ $s->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-success shadow">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="aceitaLabel-{{ $s->id }}">Solicitação aceita</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">

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

                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Cidade de destino:</strong> {{ $v->cidade->nome ?? '---' }}</li>
                        <li class="list-group-item"><strong>Dias da semana:</strong>
                            @if (count($dias) > 0)
                            @foreach ($dias as $dia)
                                <span class="badge bg-secondary me-1">{{ $dia }}</span>
                            @endforeach
                            @else
                            ---
                            @endif
                        </li>
                        <li class="list-group-item"><strong>Data da viagem:</strong> {{ $v->data ?? '---' }}</li>
                        <li class="list-group-item"><strong>Motorista:</strong> {{ $v->motorista->nome ?? '---' }}</li>
                        <li class="list-group-item"><strong>Veículo:</strong> {{ $v->veiculo->placa ?? '---' }} - {{ $v->veiculo->modelo ?? '---' }}</li>
                        <li class="list-group-item"><strong>Horário de embarque:</strong> {{ $v->horario_embarque ?? '---' }}</li>
                        <li class="list-group-item"><strong>Horário de saída:</strong> {{ $v->horario_saida ?? '---' }}</li>
                        <li class="list-group-item"><strong>Horário estimado de chegada:</strong> {{ $v->horario_chegada ?? '---' }}</li>
                        </ul>

                        <hr>
                        <p><strong>Última atualização:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal: Aguardando -->
                <div class="modal fade" id="modalAguardando-{{ $s->id }}" tabindex="-1" aria-labelledby="aguardandoLabel-{{ $s->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-primary shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="aguardandoLabel-{{ $s->id }}">Aguardando análise</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">A solicitação foi enviada. Aguarde a análise de um administrador.</p>
                        <hr>
                        <p><strong>Enviada em:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
                </div>

            @endif

        @endforeach
    </tbody>
</table>

@endsection