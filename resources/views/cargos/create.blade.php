@extends('layout')

@section('conteudo')

<form method="post" action="/cargos">

    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do cargo:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection