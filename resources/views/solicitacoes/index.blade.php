@extends('layout')

@section('conteudo')

<h1>Suas solicitações</h1>

<a class="btn btn-primary mb-3" href="/solicitacoes/create">Nova solicitação</a>

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

<h2>Registro de solicitações</h2>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Data da viagem</th>
            <th>Cidade</th>
            <th>Destino</th>
            <th>Ponto de embarque</th>
            <th>Nome do acompanhante</th>
            <th>CPF do acompanhante</th>
            <th>Situação</th>
            <th>Foto do exame</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitacoes as $s)

            @if ($s->id_usuario == Auth::user()->id)
                <tr>
                    <td>{{ $s->data }}</td>
                    <td>{{ $s->cidade }}</td>
                    <td>{{ $s->destino }}</td>
                    <td>{{ $s->ponto->referencia }}</td>
                    <td>{{ isset($s->nome_acompanhante) ? "$s->nome_acompanhante" : "" }}</td>
                    <td>{{ isset($s->cpf_acompanhante) ? "$s->cpf_acompanhante" : "" }}</td>
                    <td>
                        @if ($s->situacao == "Solicitação recusada")
                            <p><a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Solicitação recusada</a></p>
                        @endif
                        @if ($s->situacao == "Solicitação aceita")
                            <p><a href="#" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Solicitação aceita</a></p>
                        @endif
                        @if ($s->situacao == "Aguardando análise")
                            <p><a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Aguardando análise</a></p>
                        @endif
                    </td>
                    <td> <img src="{{ asset('storage/'.$s->foto) }}" height="50"/> </td>
                    <td>
                        @if ($s->situacao == "Aguardando análise")
                            <a href="/solicitacoes/{{ $s->id }}/edit" class="btn btn-warning disabled mb-1">Editar</a>
                        @endif
                        @if ($s->situacao == "Solicitação aceita")
                            <a href="/solicitacoes/{{ $s->id }}/edit" class="btn btn-warning disabled mb-1">Editar</a>
                        @endif
                        @if ($s->situacao == "Solicitação recusada")
                            <a href="/solicitacoes/{{ $s->id }}/edit" class="btn btn-warning mb-1">Editar</a>
                        @endif
                        <a href="/solicitacoes/{{ $s->id }}" class="btn btn-info mb-1">Consultar</a>
                    </td>
                </tr>
            @endif

        @endforeach
    </tbody>
</table>

@endsection