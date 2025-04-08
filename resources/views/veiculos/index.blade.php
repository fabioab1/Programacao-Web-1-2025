@extends('layout')

@section('conteudo')

<h1>Gerenciar Veículos</h1>

<a class="btn btn-primary mb-3" href="/veiculos/create">Novo Veículo</a>

@if (session('erro'))
<div class="alert alert-danger">
	{{ session('erro') }}
</div>
@endif

@if (session('sucesso'))
<div class="alert alert-success">
	{{ session('sucesso') }}
</div>
@endif

<h2>Registro de Veículos</h2>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Placa</th>
			<th>Nome</th>
			<th>Modelo</th>
			<th>Marca</th>
			<th>Ano</th>
			<th>Tipo</th>
			<th>Cor</th>
			<th>Capacidade</th>
			<th>Situação</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($veiculos as $veiculo)
		<tr>
			<td>{{ $veiculo->id }}</td>
			<td>{{ $veiculo->placa }}</td>
			<td>{{ $veiculo->nome }}</td>
			<td>{{ $veiculo->modelo }}</td>
			<td>{{ $veiculo->marca }}</td>
			<td>{{ $veiculo->ano }}</td>
			<td>{{ $veiculo->tipo }}</td>
			<td>{{ $veiculo->cor }}</td>
			<td>{{ $veiculo->capacidade }}</td>
			<td>{{ $veiculo->situacao }}</td>
			<td>
				<a href="/veiculos/{{ $veiculo->id }}/edit" class="btn btn-warning">Editar</a>
				<a href="/veiculos/{{ $veiculo->id }}" class="btn btn-info">Consultar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection