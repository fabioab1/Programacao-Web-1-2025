@extends('layout')

@section('conteudo')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary display-4">e-PAS</h1>
        <p class="lead">Seja bem-vindo(a), motorista <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    <div class="d-flex justify-content-center mb-4">
        <a href="/relatorio-viagens" class="btn btn-primary btn-lg shadow animate-grow">
            Ver minhas viagens
        </a>
    </div>

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title text-secondary mb-3">Instruções</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Para acessar as informações de suas viagens, clique no botão <strong>"Ver minhas viagens"</strong>.
                </li>
                <li class="list-group-item">
                    Para visualizar os pacientes vinculados às suas viagens, clique no botão <strong>"Pacientes passageiros"</strong> no menu superior.
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
