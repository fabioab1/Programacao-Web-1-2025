@extends('layout')

@section('conteudo')

<h1>Motoristas</h1>

<a class="btn btn-primary mb-3" href="/motoristas/create">Cadastrar motorista</a>

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

<h2>Registro de motoristas</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do motorista</th>
            <th>Número de celular</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($motoristas as $m)

        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->nome }}</td>
            <td>{{ $m->celular }}</td>
            <td>{{ $m->email }}</td>
			<td>
				<div class="btn-group" role="group">
					<a href="/motoristas/{{ $m->id }}/edit" class="btn btn-sm btn-warning" title="Editar">
						Editar
					</a>
					<a href="/motoristas/{{ $m->id }}" class="btn btn-sm btn-info" title="Consultar">
						Consultar
					</a>
				</div>
			</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection