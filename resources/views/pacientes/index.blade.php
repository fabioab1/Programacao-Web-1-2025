@extends('layout')

@section('conteudo')

<h1>Pacientes</h1>

<a class="btn btn-primary mb-3" href="/pacientes/create">Cadastrar paciente</a>

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

<h2>Registro de pacientes</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do paciente</th>
            <th>CNS</th>
            <th>CPF</th>
            <th>Número de celular</th>
            <th>E-mail</th>
            <th>Data de nascimento</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $p)

        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->cns }}</td>
            <td>{{ $p->cpf }}</td>
            <td>{{ $p->celular }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->dataNasc }}</td>
            <td>{{ $p->logradouro }}</td>
            <td>{{ $p->numero }}</td>
            <td>{{ $p->bairro }}</td>
            <td>{{ $p->cidade }}</td>
            <td>
                <a href="/pacientes/{{ $p->id }}/edit" class="btn btn-warning mb-1">Editar</a>
                <a href="/pacientes/{{ $p->id }}" class="btn btn-info">Consultar</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection