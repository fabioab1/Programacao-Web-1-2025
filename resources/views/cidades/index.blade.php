@extends('layout')

@section('conteudo')

<h1>Cidades</h1>

<a class="btn btn-primary mb-3" href="/cidades/create">Cadastrar cidade</a>

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

<h2>Registro de cidades</h2>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Estado</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($cidades as $cidade)

		<tr>
			<td>{{ $cidade->id }}</td>
			<td>{{ $cidade->nome }}</td>
			<td>{{ $cidade->estado }}</td>
			<td>
				<div class="btn-group" role="group">
					<a href="/cidades/{{ $cidade->id }}/edit" class="btn btn-sm btn-warning" title="Editar">
						Editar
					</a>
					<a href="/cidades/{{ $cidade->id }}" class="btn btn-sm btn-info" title="Consultar">
						Consultar
					</a>
				</div>
			</td>
		</tr>

		@endforeach
	</tbody>
</table>

@endsection