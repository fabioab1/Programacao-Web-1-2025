@extends('layout')

@section('conteudo')

    <h1>e-PAS</h1>
    <p>Seja bem-vindo(a) motorista {{ Auth::user()->name }}!</p>

    <a href="/relatorio-motorista" class="btn btn-primary mt-3">Gerar Relatório de Viagens (PDF)</a>

@endsection