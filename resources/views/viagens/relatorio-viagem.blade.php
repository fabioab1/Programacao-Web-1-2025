@extends('layout')

@section('conteudo')

<h1>Minhas Viagens</h1>

@if (session('sucesso'))
<div class="alert alert-success">
    {{ session('sucesso') }}
</div>
@endif

@if ($viagens->isEmpty())
    <p>Você não possui viagens cadastradas.</p>
@else
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cidade</th>
                <th>Periodicidade</th>
                <th>Data</th>
                <th>Horário de Embarque</th>
                <th>Horário de Saída</th>
                <th>Horário de Chegada</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viagens as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->cidade->nome }}</td>
                @if ($v->tipo_viagem)
                    <td>Viagem diária</td>
                @else
                    <td>Viagem esporádica</td>
                @endif
                <td>{{ $v->data }}</td>
                <td>{{ $v->horario_embarque }}</td>
                <td>{{ $v->horario_saida }}</td>
                <td>{{ $v->horario_chegada }}</td>
                <td>{{ ucfirst($v->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection