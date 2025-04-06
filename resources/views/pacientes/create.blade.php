@extends('layout')

@section('conteudo')

<form method="post" action="/pacientes">

    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cns" class="form-label">Nº do Cartão Nacional de Saúde:</label>
        <input type="text" id="cns" name="cns" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">Nº do CPF:</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="dataNasc" class="form-label">Data de nascimento:</label>
        <input type="date" id="dataNasc" name="dataNasc" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="logradouro" class="form-label">Logradouro:</label>
        <input type="text" id="logradouro" name="logradouro" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="numero" class="form-label">Nº:</label>
        <input type="number" id="numero" name="numero" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" id="bairro" name="bairro" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade:</label>
        <input type="text" id="cidade" name="cidade" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection