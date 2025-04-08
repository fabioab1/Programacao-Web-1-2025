@extends('layout')

@section('conteudo')

<form method="post" action="/cargos/{{ $cargo->id }}">

    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do cargo:</label>
        <input type="text" id="nome" name="nome" value="{{ $cargo->nome }}" class="form-control" required="" disabled>
    </div>

    <p>Deseja excluir o registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="/cargos" class="btn btn-primary">Cancelar</a>
</form>

@endsection