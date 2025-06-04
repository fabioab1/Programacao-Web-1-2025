@extends('layout')

@section('conteudo')

<form method="post" action="/alterar-dados/motorista/store">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" value="{{ $motorista->nome }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" value="{{ $motorista->celular }}" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" value="{{ $motorista->email }}" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

@endsection