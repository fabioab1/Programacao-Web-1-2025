@extends('layout')

@section('conteudo')

<h1>Todas as solicitações</h1>

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

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Data da viagem</th>
            <th>Paciente</th>
            <th>Cidade</th>
            <th>Destino</th>
            <th>Ponto de embarque</th>
            <th>Nome do acompanhante</th>
            <th>CPF do acompanhante</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitacoes as $s)
            <tr>
                <td>{{ $s->data }}</td>
                <td>{{ $s->user->name }}</td>
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
                <td>
                    <button class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalAceitar{{ $s->id }}" {{ $s->situacao == "Solicitação aceita" ? "disabled" : "" }}>
                        Aceitar
                    </button>
                    <button class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalRecusar{{ $s->id }}" {{ $s->situacao == "Solicitação recusada" ? "disabled" : "" }}>
                        Recusar
                    </button>
                    <a href="/solicitacoes/{{ $s->id }}/edit" class="btn btn-secondary mb-1">Ver detalhes</a>
                </td>
            </tr>

            <div class="modal fade" id="modalAceitar{{ $s->id }}" tabindex="-1" aria-labelledby="modalAceitarLabel{{ $s->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="/aceitar-solicitacoes/aceitar/{{ $s->id }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="situacao" value="Solicitação aceita">
                        <input type="hidden" name="motivo" value="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAceitarLabel{{ $s->id }}">Aceitar Solicitação</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Deseja aceitar esta solicitação?

                                <div class="mb-3 mt-3">
                                    <label for="viagem" class="form-label">Selecione a viagem:</label>
                                    <select id="viagem" name="viagem_id" class="form-select" required="">
                                        @foreach ($viagens as $v)
                                        <option value="{{ $v->id }}">
                                            {{ $v->cidade->nome }} - {{ $v->motorista->nome }} - {{ $v->veiculo->placa }} - {{ $v->veiculo->modelo }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Sim, aceitar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modalRecusar{{ $s->id }}" tabindex="-1" aria-labelledby="modalRecusarLabel{{ $s->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="/aceitar-solicitacoes/recusar/{{ $s->id }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="situacao" value="Solicitação recusada">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRecusarLabel{{ $s->id }}">Recusar Solicitação</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="motivo" class="form-label">Motivo da recusa</label>
                                    <textarea name="motivo" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Recusar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        @endforeach
    </tbody>
</table>

@endsection