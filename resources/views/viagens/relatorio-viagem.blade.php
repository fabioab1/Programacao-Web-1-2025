@extends('layout')

@section('conteudo')

<h1>Minhas viagens</h1>

@if (session('sucesso'))
<div class="alert alert-success">
    {{ session('sucesso') }}
</div>
@endif

@if ($viagens->isEmpty())
    <p>Você não possui viagens cadastradas.</p>
@else
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cidade</th>
                <th>Periodicidade</th>
                <th>Data</th>
                <th>Horário de embarque</th>
                <th>Horário de saída</th>
                <th>Horário de chegada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viagens as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->cidade->nome }}</td>
                @if ($v->tipo_viagem)
                    <td>Viagem diária</td>
                @else
                    <td>Viagem esporádica</td>
                @endif
                <td>{{ $v->data }}</td>
                <td>{{ $v->horario_embarque }}</td>
                <td>{{ $v->horario_saida }}</td>
                <td>{{ $v->horario_chegada }}</td>
                <td>
                    <button class="btn btn-sm btn-secondary" title="Ver detalhes" data-bs-toggle="modal" data-bs-target="#modalViagem{{ $v->id }}">
                        Ver detalhes
                    </button>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    @foreach ($viagens as $v)

    <!-- Modal -->
    <div class="modal fade" id="modalViagem{{ $v->id }}" tabindex="-1" aria-labelledby="viagemLabel{{ $v->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-success shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="viagemLabel{{ $v->id }}">Detalhes da viagem</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">

                    @php
                        $dias = [];
                        if($v->domingo) $dias[] = 'Domingo';
                        if($v->segunda) $dias[] = 'Segunda-feira';
                        if($v->terca) $dias[] = 'Terça-feira';
                        if($v->quarta) $dias[] = 'Quarta-feira';
                        if($v->quinta) $dias[] = 'Quinta-feira';
                        if($v->sexta) $dias[] = 'Sexta-feira';
                        if($v->sabado) $dias[] = 'Sábado';
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
                        <li class="list-group-item"><strong>Data:</strong> {{ $v->data ?? '---' }}</li>
                        <li class="list-group-item"><strong>Motorista:</strong> {{ $v->motorista->nome ?? '---' }}</li>
                        <li class="list-group-item"><strong>Veículo:</strong> {{ $v->veiculo->placa ?? '---' }} - {{ $v->veiculo->modelo ?? '---' }}</li>
                        <li class="list-group-item"><strong>Horário de embarque:</strong> {{ $v->horario_embarque }}</li>
                        <li class="list-group-item"><strong>Horário de saída:</strong> {{ $v->horario_saida }}</li>
                        <li class="list-group-item"><strong>Horário estimado de chegada:</strong> {{ $v->horario_chegada }}</li>
                    </ul>

                    <hr>
                    <h6>Passageiros</h6>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data de nascimento</th>
                                <th>Acompanhante</th>
                                <th>Ponto</th>
                                <th>Destino</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitacoes as $s)
                                @if ($s->viagem_id == $v->id)

                                @php

                                    $data_nasc = null;

                                    if ($s->paciente)
                                    {
                                        $data_nasc = DateTime::createFromFormat('Y-m-d', $s->paciente->dataNasc);
                                        $data_nasc = $data_nasc->format('d/m/Y');
                                    }
                                @endphp

                                    <tr>
                                        <td>{{ $s->paciente->nome ?? '---' }}</td>
                                        <td>{{ $data_nasc ?? '---' }}</td>
                                        <td>{{ $s->nome_acompanhante ?? '---' }}</td>
                                        <td>{{ $s->ponto->referencia ?? '---' }}</td>
                                        <td>{{ $s->destino ?? '---' }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <p><strong>Última atualização:</strong> {{ $v->updated_at->format('d/m/Y H:i') }}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endif

@endsection