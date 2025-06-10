@extends('layout')

@section('conteudo')

<h1>Cargos</h1>

<a class="btn btn-primary mb-3" href="/cargos/create">Cadastrar cargo</a>

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

<h2>Registro de cargos</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do cargo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cargos as $c)

        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
			<td>
				<div class="btn-group" role="group">
					<a href="/cargos/{{ $c->id }}/edit" class="btn btn-sm btn-warning" title="Editar">
						Editar
					</a>
					<a href="/cargos/{{ $c->id }}" class="btn btn-sm btn-info" title="Consultar">
						Consultar
					</a>
				</div>
			</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection