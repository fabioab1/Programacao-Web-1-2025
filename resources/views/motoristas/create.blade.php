@extends('layout')

@section('conteudo')

<form method="post" action="/motoristas">

    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection