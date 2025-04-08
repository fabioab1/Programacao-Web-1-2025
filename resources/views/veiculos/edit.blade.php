@extends('layout')

@section('conteudo')
<form method="post" action="/veiculos/{{ $veiculo->id }}">
	@csrf
	@method('PUT')

	<div class="mb-3">
		<label for="placa" class="form-label">Informe a placa</label>
		<input type="text" id="placa" name="placa" value="{{ $veiculo->placa }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="nome" class="form-label">Informe o nome</label>
		<input type="text" id="nome" name="nome" value="{{ $veiculo->nome }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="modelo" class="form-label">Informe o modelo</label>
		<input type="text" id="modelo" name="modelo" value="{{ $veiculo->modelo }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="ano" class="form-label">Informe o ano</label>
		<input type="number" id="ano" name="ano" value="{{ $veiculo->ano }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="marca" class="form-label">Informe a marca</label>
		<input type="text" id="marca" name="marca" value="{{ $veiculo->marca }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="tipo" class="form-label">Informe o tipo</label>
		<input type="text" id="tipo" name="tipo" value="{{ $veiculo->tipo }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="cor" class="form-label">Informe a cor</label>
		<input type="text" id="cor" name="cor" value="{{ $veiculo->cor }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="capacidade" class="form-label">Informe a capacidade</label>
		<input type="number" id="capacidade" name="capacidade" value="{{ $veiculo->capacidade }}" class="form-control" required>
	</div>

	<div class="mb-3">
		<label for="situacao" class="form-label">Informe a situação</label>
		<input type="text" id="situacao" name="situacao" value="{{ $veiculo->situacao }}" class="form-control" required>
	</div>

	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection