@extends('layout')

@section('conteudo')

<form method="post" action="/cargos/{{ $cargo->id }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do cargo:</label>
        <input type="text" id="nome" name="nome" value="{{ $cargo->nome }}" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection