@extends('layout')

@section('conteudo')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary display-4">e-PAS</h1>
        <p class="lead">Seja bem-vindo(a), administrador(a) <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    <div class="d-flex justify-content-center mb-4 gap-3">
        <a href="/viagens" class="btn btn-outline-primary btn-lg shadow animate-grow">
            Gerenciar viagens
        </a>
        <a href="/aceitar-solicitacoes" class="btn btn-outline-secondary btn-lg shadow animate-grow">
            Analisar solicitações
        </a>
    </div>

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <h4 class="card-title text-secondary mb-3">Painel do administrador</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Gerencie as <strong>viagens</strong> cadastradas e seus respectivos motoristas, veículos e cidades.
                </li>
                <li class="list-group-item">
                    Analise e aceite ou recuse <strong>solicitações de transporte</strong> realizadas pelos pacientes.
                </li>
                <li class="list-group-item">
                    Visualize os <strong>pacientes vinculados</strong> às viagens e organize os pontos de embarque.
                </li>
            </ul>
        </div>
    </div>

</div>

<style>
    .animate-grow {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .animate-grow:hover {
        transform: scale(1.05);
        box-shadow: 0 0.5rem 1rem rgba(0, 123, 255, 0.25);
    }
</style>

@endsection
