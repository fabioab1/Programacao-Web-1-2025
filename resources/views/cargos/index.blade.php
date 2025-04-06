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
                <a href="/cargos/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>
                <a href="/cargos/{{ $c->id }}" class="btn btn-info">Consultar</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection