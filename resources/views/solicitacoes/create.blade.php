@extends('layout')

@section('conteudo')

<form method="post" action="/solicitacoes" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}"/>

    <div class="mb-3">
        <label for="data" class="form-label">Data da viagem:</label>
        <input type="date" id="data" name="data" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade de destino:</label>
        <input type="text" id="cidade" name="cidade" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="destino" class="form-label">Local da consulta:</label>
        <input type="text" id="destino" name="destino" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="ponto" class="form-label">Selecione o ponto de embarque:</label>
        <select id="ponto" name="ponto_id" class="form-select" required="">
            @foreach ($pontos as $po)
                <option value="{{ $po->id }}">
                    {{ $po->referencia }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nome_acompanhante" class="form-label">Nome do acompanhante:</label>
        <input type="text" id="nome_acompanhante" name="nome_acompanhante" class="form-control">
    </div>

    <div class="mb-3">
        <label for="cpf_acompanhante" class="form-label">CPF do acompanhante:</label>
        <input type="text" id="cpf_acompanhante" name="cpf_acompanhante" class="form-control">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto do exame ou consulta médica:</label>
        <input type="file" id="foto" name="foto" class="form-control" required="">
    </div>

    <input type="hidden" name="situacao" value="Aguardando análise"/>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection