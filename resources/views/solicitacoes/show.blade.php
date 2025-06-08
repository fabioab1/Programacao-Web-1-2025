@extends('layout')

@section('conteudo')

@if ($solicitacao->viagem)
    <hr>
    <h3>Informações da viagem agendada</h3>

    <p><strong>Cidade de destino:</strong> {{ $solicitacao->viagem->cidade->nome }}</p>

    <p><strong>Dias da semana:</strong>
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
        {{ count($dias) > 0 ? implode(', ', $dias) : '---' }}
    </p>

    <p><strong>Data da viagem></strong> {{ $solicitacao->viagem->data ?? '---' }}</p>
    <p><strong>Motorista:</strong> {{ $solicitacao->viagem->motorista->nome }}</p>
    <p><strong>Veículo:</strong> {{ $solicitacao->viagem->veiculo->placa }} - {{ $solicitacao->veiculo->modelo }} </p>
    <p><strong>Horário de embarque:</strong> {{ $solicitacao->viagem->horario_embarque }}</p>
    <p><strong>Horário de saída:</strong> {{ $solicitacao->viagem->horario_saida }}</p>
    <p><strong>Horário estimado de chegada:</strong> {{ $solicitacao->viagem->horario_chegada }}</p>

    <h4>Pontos da viagem</h4>

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