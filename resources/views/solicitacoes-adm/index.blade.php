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
                        <a href="#" class="link-danger" data-bs-toggle="modal" data-bs-target="#modalRecusada-{{ $s->id }}">
                            Solicitação recusada
                        </a>
                    @elseif ($s->situacao == "Solicitação aceita")
                        <a href="#" class="link-success" data-bs-toggle="modal" data-bs-target="#modalAceita-{{ $s->id }}">
                            Solicitação aceita
                        </a>
                    @elseif ($s->situacao == "Aguardando análise")
                        <a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalAguardando-{{ $s->id }}">
                            Aguardando análise
                        </a>
                    @endif
                </td>
                <td>
                    <button class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalAceitar{{ $s->id }}" {{ $s->situacao == "Solicitação aceita" ? "disabled" : "" }}>
                        Aceitar
                    </button>
                    <button class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalRecusar{{ $s->id }}" {{ $s->situacao == "Solicitação recusada" ? "disabled" : "" }}>
                        Recusar
                    </button>
                    <a href="/aceitar-solicitacoes/consultar/{{ $s->id }}" class="btn btn-secondary mb-1">Ver detalhes</a>
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
                                            {{ $v->cidade->nome }} - {{ $v->horario_saida }} - {{ $v->motorista->nome }} - {{ $v->veiculo->placa }} - {{ $v->veiculo->modelo }}
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

            <!-- Modal: Recusada -->
            <div class="modal fade" id="modalRecusada-{{ $s->id }}" tabindex="-1" aria-labelledby="recusadaLabel-{{ $s->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-danger shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="recusadaLabel-{{ $s->id }}">Solicitação recusada</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Motivo:</strong></p>
                    <p class="text-muted">{{ $s->motivo ?? 'Não informado.' }}</p>
                    <hr>
                    <p><strong>Última atualização:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal: Aceita -->
            <div class="modal fade" id="modalAceita-{{ $s->id }}" tabindex="-1" aria-labelledby="aceitaLabel-{{ $s->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-success shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="aceitaLabel-{{ $s->id }}">Solicitação aceita</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">

                    A solicitação foi aceita e atribuída a uma viagem.

                    <hr>
                    <p><strong>Última atualização:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal: Aguardando -->
            <div class="modal fade" id="modalAguardando-{{ $s->id }}" tabindex="-1" aria-labelledby="aguardandoLabel-{{ $s->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-primary shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="aguardandoLabel-{{ $s->id }}">Aguardando análise</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">A solicitação aguarda uma resposta.</p>
                    <hr>
                    <p><strong>Enviada em:</strong> {{ $s->updated_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>

        @endforeach
    </tbody>
</table>

@endsection