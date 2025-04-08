@extends('layout')

@section('conteudo')
	<form method="post" action="/veiculos/{{ $veiculo->id }}">
		@CSRF
		@method('DELETE')
		<div class="mb-3">
			<label for="placa" class="form-label">Placa</label>
			<input type="text" id="placa" name="placa" value="{{ $veiculo->placa }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="nome" class="form-label">Nome</label>
			<input type="text" id="nome" name="nome" value="{{ $veiculo->nome }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="modelo" class="form-label">Modelo</label>
			<input type="text" id="modelo" name="modelo" value="{{ $veiculo->modelo }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="ano" class="form-label">Ano</label>
			<input type="number" id="ano" name="ano" value="{{ $veiculo->ano }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="marca" class="form-label">Marca</label>
			<input type="text" id="marca" name="marca" value="{{ $veiculo->marca }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="tipo" class="form-label">Tipo</label>
			<input type="text" id="tipo" name="tipo" value="{{ $veiculo->tipo }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="cor" class="form-label">Cor</label>
			<input type="text" id="cor" name="cor" value="{{ $veiculo->cor }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="capacidade" class="form-label">Capacidade</label>
			<input type="number" id="capacidade" name="capacidade" value="{{ $veiculo->capacidade }}" class="form-control" disabled>
		</div>

		<div class="mb-3">
			<label for="situacao" class="form-label">Situação</label>
			<input type="text" id="situacao" name="situacao" value="{{ $veiculo->situacao }}" class="form-control" disabled>
		</div>

		<p>Deseja excluir o registro?</p>
		<button type="submit" class="btn btn-danger">Excluir</button>
		<a href="/veiculos" class="btn btn-primary">Cancelar</a>
	</form>

@endsection