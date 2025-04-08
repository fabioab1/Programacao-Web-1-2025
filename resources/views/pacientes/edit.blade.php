@extends('layout')

@section('conteudo')

<form method="post" action="/pacientes/{{ $paciente->id }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" value="{{ $paciente->nome }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cns" class="form-label">Nº do Cartão Nacional de Saúde:</label>
        <input type="text" id="cns" name="cns" value="{{ $paciente->cns }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">Nº do CPF:</label>
        <input type="text" id="cpf" name="cpf" value="{{ $paciente->cpf }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" value="{{ $paciente->celular }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" value="{{ $paciente->email }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="dataNasc" class="form-label">Data de nascimento:</label>
        <input type="date" id="dataNasc" name="dataNasc" value="{{ $paciente->dataNasc }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="logradouro" class="form-label">Logradouro:</label>
        <input type="text" id="logradouro" name="logradouro" value="{{ $paciente->logradouro }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="numero" class="form-label">Nº:</label>
        <input type="number" id="numero" name="numero" value="{{ $paciente->numero }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" id="bairro" name="bairro" value="{{ $paciente->bairro }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $paciente->cidade }}" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection