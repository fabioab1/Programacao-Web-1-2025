@extends('layout')

@section('conteudo')

<h1>Administradores</h1>

<a class="btn btn-primary mb-3" href="/administradores/create">Cadastrar administrador</a>

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

<h2>Registro de administradores</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do administrador</th>
            <th>Nome do cargo</th>
            <th>Número de celular</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($administradores as $a)

        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->nome }}</td>
            <td>{{ $a->cargo->nome }}</td>
            <td>{{ $a->celular }}</td>
            <td>{{ $a->email }}</td>
            <td>
                <a href="/administradores/{{ $a->id }}/edit" class="btn btn-warning">Editar</a>
                <a href="/administradores/{{ $a->id }}" class="btn btn-info">Consultar</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection