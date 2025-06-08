@extends('layout')

@section('conteudo')

<h1>Viagens</h1>

<a class="btn btn-primary mb-3" href="/viagens/create">Criar viagem</a>

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

<h2>Registro de viagens</h2>

<table class="table table-hover table-striped">
	<thead>
		<tr>
            <th>ID</th>
            <th>Cidade</th>
			<th>Motorista</th>
			<th>Veículo</th>
			<th>Periodicidade</th>
			<th>Data</th>
            <!--- Dias da semana serão exibidos ao consultar a viagem --->
			<th>Horário de embarque</th>
			<th>Horário de saída</th>
			<th>Horário de chegada</th>
            <!--- Pontos de embarque e desembarque da viagem serão exibidos ao
            consultar a viagem --->
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($viagens as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->cidade->nome }}</td>
			<td>{{ $v->motorista->nome }}</td>
			<td>{{ $v->veiculo->placa }}</td>
            @if ($v->tipo_viagem)
                <td>Viagem diária</td>
            @endif
            @if (!$v->tipo_viagem)
                <td>Viagem esporádica</td>
			@endif
            <td>{{ $v->data }}</td>
			<td>{{ $v->horario_embarque }}</td>
			<td>{{ $v->horario_saida }}</td>
			<td>{{ $v->horario_chegada }}</td>
			<td>
				<a href="/pontos-viagem/{{ $v->id }}" class="btn btn-secondary mb-1">Pontos</a>
				<a href="/viagens/{{ $v->id }}/edit" class="btn btn-warning mb-1">Editar</a>
				<a href="/viagens/{{ $v->id }}" class="btn btn-info">Consultar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection