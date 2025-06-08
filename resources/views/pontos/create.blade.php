@extends('layout')

@section('conteudo')

<form method="post" action="/pontos">

	@csrf

	<div class="mb-3">
		<label for="logradouro" class="form-label">Logradouro:</label>
		<input type="text" id="logradouro" name="logradouro" class="form-control" maxlength="60" required="">
	</div>

	<div class="mb-3">
		<label for="bairro" class="form-label">Bairro:</label>
		<input type="text" id="bairro" name="bairro" class="form-control" maxlength="50" required="">
	</div>
	
	<div class="mb-3">
		<label for="numero" class="form-label">Nº:</label>
		<input type="text" id="numero" name="numero" class="form-control" maxlength="50">
	</div>

	<div class="mb-3">
		<label for="referencia" class="form-label">Referência:</label>
		<textarea id="referencia" name="referencia" class="form-control" maxlength="255" required=""></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

@endsection