@extends('layout')

@section('conteudo')

<h1>Pacientes das suas viagens</h1>

@if ($solicitacoes->isEmpty())
    <p>Não há pacientes vinculados às suas viagens.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Ponto</th>
                <th>Data</th>
                <th>Destino</th>
                <th>Acompanhante</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitacoes as $s)
            <tr>
                <td>{{ $s->user->name }}</td>
                <td>{{ $s->ponto->descricao }}</td>
                <td>{{ $s->data }}</td>
                <td>{{ $s->destino }}</td>
                <td>{{ $s->nome_acompanhante ?? 'Nenhum' }}</td>
                <td>{{ ucfirst($s->situacao) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection