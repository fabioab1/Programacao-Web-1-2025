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
                <a href="/motoristas/{{ $m->id }}/edit" class="btn btn-warning">Editar</a>
                <a href="/motoristas/{{ $m->id }}" class="btn btn-info">Consultar</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection