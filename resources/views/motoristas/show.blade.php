@extends('layout')

@section('conteudo')

<form method="post" action="/motoristas/{{ $motorista->id }}">

    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" value="{{ $motorista->nome }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" value="{{ $motorista->celular }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" value="{{ $motorista->email }}" class="form-control" required="" disabled>
    </div>

    <p>Deseja excluir o registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="/motoristas" class="btn btn-primary">Cancelar</a>
</form>

@endsection