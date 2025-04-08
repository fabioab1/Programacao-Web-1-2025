@extends('layout')

@section('conteudo')

<form method="post" action="/cidades/{{ $cidade->id }}">

	@csrf
	@method('DELETE')

	<div class="mb-3">
		<label for="nome" class="form-label">Nome:</label>
		<input type="text" id="nome" name="nome" value="{{ $cidade->nome }}" class="form-control" required="" disabled>
	</div>

	<div class="mb-3">
		<label for="estado" class="form-label">Estado:</label>
		<input type="text" id="estado" name="estado" value="{{ $cidade->estado }}" class="form-control" required="" disabled>
	</div>

	<p>Deseja excluir o registro?</p>
	<button type="submit" class="btn btn-danger">Excluir</button>
	<a href="/cidades" class="btn btn-primary">Cancelar</a>
</form>

@endsection