@extends('layout')

@section('conteudo')

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