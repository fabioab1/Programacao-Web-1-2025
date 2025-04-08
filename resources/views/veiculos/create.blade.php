@extends('layout')

@section('conteudo')

<form method="post" action="/veiculos">
	@csrf
	<div class="mb-3">
		<label for="placa" class="form-label">Informe a placa</label>
		<input type="text" id="placa" name="placa" class="form-control" maxlength="7" required="">
	</div>

	<div class="mb-3">
		<label for="nome" class="form-label">Informe o nome</label>
		<input type="text" id="nome" name="nome" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="modelo" class="form-label">Informe o modelo</label>
		<input type="text" id="modelo" name="modelo" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="ano" class="form-label">Informe o ano</label>
		<input type="number" id="ano" name="ano" class="form-control" required="">
	</div>

	<div class="mb-3">
		<label for="marca" class="form-label">Informe a marca</label>
		<input type="text" id="marca" name="marca" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="tipo" class="form-label">Informe o tipo</label>
		<input type="text" id="tipo" name="tipo" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="cor" class="form-label">Informe a cor</label>
		<input type="text" id="cor" name="cor" class="form-control" maxlength="45" required="">
	</div>

	<div class="mb-3">
		<label for="capacidade" class="form-label">Informe a capacidade</label>
		<input type="number" id="capacidade" name="capacidade" class="form-control" required="">
	</div>

	<div class="mb-3">
		<label for="situacao" class="form-label">Informe a situação</label>
		<input type="text" id="situacao" name="situacao" class="form-control" maxlength="45" required="">
	</div>


	<button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection