@extends('layout')

@section('conteudo')

<form method="post" action="/cidades">

	@csrf

	<div class="mb-3">
		<label for="nome" class="form-label">Nome da Cidade:</label>
		<input type="text" id="nome" name="nome" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="estado" class="form-label">Estado:</label>
		<input type="text" id="estado" name="estado" class="form-control" maxlength="45" required="">
	</div>

	<button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection