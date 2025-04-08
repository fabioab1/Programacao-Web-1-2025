@extends('layout')

@section('conteudo')

<h1>Pontos</h1>

<a class="btn btn-primary mb-3" href="/pontos/create">Cadastrar ponto</a>

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

<h2>Registro de pontos</h2>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Logradouro</th>
			<th>Bairro</th>
			<th>Referência</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pontos as $p)

		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->logradouro }}</td>
			<td>{{ $p->bairro }}</td>
			<td>{{ $p->referencia }}</td>
			<td>
				<a href="/pontos/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>
				<a href="/pontos/{{ $p->id }}" class="btn btn-info">Consultar</a>
			</td>
		</tr>

		@endforeach
	</tbody>
</table>

@endsection