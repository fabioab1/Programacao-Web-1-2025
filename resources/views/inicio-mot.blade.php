@extends('layout')

@section('conteudo')

    <h1>e-PAS</h1>
    <p>Seja bem-vindo(a) motorista {{ Auth::user()->name }}!</p>

 <div class="mt-3 d-flex gap-2">
    <a href="/relatorio-viagens" class="btn btn-primary">Ver minhas viagens</a>
    <a href="{{ route('motorista.pacientes') }}" class="btn btn-primary">Relatório de Pacientes</a>
</div>

    <div class="mt-4">
        <h3>Instruções</h3>
        <p>Para acessar as informações de suas viagens, clique no botão "Ver minhas viagens".</p>
        <p>Para visualizar o relatório de pacientes vinculados às suas viagens, clique no botão "Relatório de Pacientes".</p>
    </div>  

@endsection