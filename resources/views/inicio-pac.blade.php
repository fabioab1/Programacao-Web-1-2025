@extends('layout')

@section('conteudo')

<style>
    .btn-animated {
        transition: all 0.3s ease;
    }

    .btn-animated:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .sus-logo {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .sus-logo:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }
</style>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-primary">e-PAS</h1>
        <p class="lead">Seja bem-vindo(a), paciente <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    <div class="card shadow rounded-4 p-4 border-0">
        <div class="card-body">
            <h4 class="mb-3 text-secondary">Como podemos te ajudar hoje?</h4>
            <p class="mb-4">Você pode solicitar transporte para exames ou consultas fora do município, acompanhar o status das suas solicitações e ver os detalhes das viagens.</p>
            
            <div class="d-flex flex-column flex-md-row gap-3">
                <a href="/solicitacoes/create" class="btn btn-primary btn-lg flex-fill btn-animated">
                    Fazer nova solicitação
                </a>
                <a href="/solicitacoes" class="btn btn-outline-primary btn-lg flex-fill btn-animated">
                    Ver minhas solicitações
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
