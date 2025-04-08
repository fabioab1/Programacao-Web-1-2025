@extends('layout')

@section('conteudo')

<form method="post" action="/pontos/{{ $ponto->id }}">

	@csrf
	@method('PUT')

	<div class="mb-3">
		<label for="logradouro" class="form-label">Logradouro:</label>
		<input type="text" id="logradouro" name="logradouro" value="{{ $ponto->logradouro }}" class="form-control" required="">
	</div>

	<div class="mb-3">
		<label for="bairro" class="form-label">Bairro:</label>
		<input type="text" id="bairro" name="bairro" value="{{ $ponto->bairro }}" class="form-control" required="">
	</div>

	<div class="mb-3">
		<label for="referencia" class="form-label">Referência:</label>
		<textarea id="referencia" name="referencia" class="form-control" required="">{{ $ponto->referencia }}</textarea>
	</div>

	<button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection