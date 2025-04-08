@extends('layout')

@section('conteudo')

<form method="post" action="/pontos/{{ $ponto->id }}">

	@csrf
	@method('DELETE')

	<div class="mb-3">
		<label for="logradouro" class="form-label">Logradouro:</label>
		<input type="text" id="logradouro" name="logradouro" value="{{ $ponto->logradouro }}" class="form-control" required="" disabled>
	</div>

	<div class="mb-3">
		<label for="bairro" class="form-label">Bairro:</label>
		<input type="text" id="bairro" name="bairro" value="{{ $ponto->bairro }}" class="form-control" required="" disabled>
	</div>

	<div class="mb-3">
		<label for="referencia" class="form-label">Referência:</label>
		<input type="text" id="referencia" name="referencia" value="{{ $ponto->referencia }}" class="form-control" required="" disabled>
	</div>

	<p>Deseja excluir o registro?</p>
	<button type="submit" class="btn btn-danger">Excluir</button>
	<a href="/pontos" class="btn btn-primary">Cancelar</a>
</form>

@endsection