@extends('layout')

@section('conteudo')

@if ($solicitacao->viagem)
<div class="card mb-4 shadow-sm border-success">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Informações da Viagem</h5>
        <span class="badge bg-light text-success">Viagem agendada</span>
    </div>
    <div class="card-body">

        <div class="row mb-2">
            <div class="col-md-6">
                <p><strong>Cidade de destino:</strong> {{ $solicitacao->viagem->cidade->nome }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Data da viagem:</strong> {{ $solicitacao->viagem->data ?? '---' }}</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <p><strong>Motorista:</strong> {{ $solicitacao->viagem->motorista->nome }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Veículo:</strong> {{ $solicitacao->viagem->veiculo->placa }} - {{ $solicitacao->viagem->veiculo->modelo }}</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-4">
                <p><strong>Horário de embarque:</strong> {{ $solicitacao->viagem->horario_embarque }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Horário de saída:</strong> {{ $solicitacao->viagem->horario_saida }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Chegada estimada:</strong> {{ $solicitacao->viagem->horario_chegada }}</p>
            </div>
        </div>

        <div class="mb-2">
            @php
                $dias = [];
                if($solicitacao->viagem->domingo) $dias[] = 'Domingo';
                if($solicitacao->viagem->segunda) $dias[] = 'Segunda-feira';
                if($solicitacao->viagem->terca) $dias[] = 'Terça-feira';
                if($solicitacao->viagem->quarta) $dias[] = 'Quarta-feira';
                if($solicitacao->viagem->quinta) $dias[] = 'Quinta-feira';
                if($solicitacao->viagem->sexta) $dias[] = 'Sexta-feira';
                if($solicitacao->viagem->sabado) $dias[] = 'Sábado';
            @endphp
            <p><strong>Dias da semana:</strong>
                @if (count($dias) > 0)
                    @foreach ($dias as $dia)
                        <span class="badge bg-secondary me-1">{{ $dia }}</span>
                    @endforeach
                @else
                    ---
                @endif
            </p>
        </div>

        <hr>
        <h6 class="mb-3">Pontos da viagem</h6>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Nº</th>
                    <th>Referência</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pontosViagem as $pv)
                <tr>
                    <td>{{ $pv->ponto->logradouro }}</td>
                    <td>{{ $pv->ponto->bairro }}</td>
                    <td>{{ $pv->ponto->numero }}</td>
                    <td>{{ $pv->ponto->referencia }}</td>
                    <td>{{ $pv->tipo_ponto == 0 ? "Embarque" : "Desembarque" }}</td>
                    <td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endif


<form method="post" action="/solicitacoes/{{ $solicitacao->id }}">

    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="data" class="form-label">Data da viagem:</label>
        <input type="date" id="data" name="data" value="{{ $solicitacao->data }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade de destino:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $solicitacao->cidade }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="destino" class="form-label">Local da consulta:</label>
        <input type="text" id="destino" name="destino" value="{{ $solicitacao->destino }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="ponto" class="form-label">Selecione o ponto de embarque:</label>
        <select id="ponto" name="ponto" class="form-select" required="" disabled>
            @foreach ($pontos as $po)
            <option value="{{ $po->id }}" {{ $solicitacao->ponto_id == $po->id ? "selected" : ""}}>
                {{ $po->referencia }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="n-acompanhante" class="form-label">Nome do acompanhante:</label>
        <input type="text" id="n-acompanhante" name="n-acompanhante" value="{{ $solicitacao->nome_acompanhante }}" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label for="c-acompanhante" class="form-label">CPF do acompanhante:</label>
        <input type="text" id="c-acompanhante" name="c-acompanhante" value="{{ $solicitacao->cpf_acompanhante }}" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <p class="form-label">Foto do exame</p>
        @if ($solicitacao->foto)
        <img src="{{ asset('storage/'.$solicitacao->foto) }}" alt="Foto do exame" style="max-width: 150px;" />
        @endif
    </div>

    <p>Deseja excluir o registro?</p>
    <button type="submit" class="btn btn-danger" {{ $solicitacao->situacao == "Solicitação aceita" ? "disabled" : "" }}>Excluir</button>
    <a href="/solicitacoes" class="btn btn-primary">Cancelar</a>
</form>

@endsection