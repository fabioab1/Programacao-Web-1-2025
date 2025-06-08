@extends('layout')

@section('conteudo')

<form method="post" action="/solicitacoes/{{ $solicitacao->id }}" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="data" class="form-label">Data da viagem:</label>
        <input type="date" id="data" name="data" value="{{ $solicitacao->data }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade de destino:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $solicitacao->cidade }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="destino" class="form-label">Local da consulta:</label>
        <input type="text" id="destino" name="destino" value="{{ $solicitacao->destino }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="ponto" class="form-label">Selecione o ponto de embarque:</label>
        <select id="ponto" name="ponto_id" class="form-select" required="">
            @foreach ($pontos as $po)
            <option value="{{ $po->id }}" {{ $solicitacao->ponto_id == $po->id ? "selected" : ""}}>
                {{ $po->referencia }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="n-acompanhante" class="form-label">Nome do acompanhante:</label>
        <input type="text" id="n-acompanhante" name="n-acompanhante" value="{{ $solicitacao->nome_acompanhante }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="c-acompanhante" class="form-label">CPF do acompanhante:</label>
        <input type="text" id="c-acompanhante" name="c-acompanhante" value="{{ $solicitacao->cpf_acompanhante }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto do exame ou consulta médica:</label>
        @if ($solicitacao->foto)
            <div class="mb-2">
                <img src="{{ asset('storage/'. $solicitacao->foto) }}" alt="Foto do exame" style="max-width: 150px;" />
            </div>
        @endif
        <input type="file" name="foto" id="foto" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="/solicitacoes" class="btn btn-danger">Cancelar</a>
</form>

@endsection