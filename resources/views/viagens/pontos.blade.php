@extends('layout')

@section('conteudo')

    <h2>Pontos</h2>

    <form method="post" action="/pontos-viagem/adicionar">

        @csrf

        <input type="hidden" name="viagem_id" value="{{ $id }}">

        <div class="mb-3">
            <label for="ponto_id" class="form-label">Selecione o ponto:</label>
            <select id="ponto_id" name="ponto_id" class="form-select" required="">
                @foreach ($pontos as $p)
                <option value="{{ $p->id }}">
                    {{ $p->referencia }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <div class="form-check ">
                <input type="radio" id="tipo_ponto" name="tipo_ponto" class="form-check-input" value="0" required>
                <label for="tipo_ponto" class="form-check-label">Embarque</label>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check ">
                <input type="radio" id="tipo_ponto" name="tipo_ponto" class="form-check-input" value="1">
                <label for="tipo_ponto" class="form-check-label">Desembarque</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="/viagens" class="btn btn-secondary">Voltar</a>

    </form>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Nº</th>
                <th>Referência</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pontosViagem as $pv)
            <tr>
                <td>{{ $pv->ponto->logradouro }}</td>
                <td>{{ $pv->ponto->bairro }}</td>
                <td>{{ $pv->ponto->numero }}</td>
                <td>{{ $pv->ponto->referencia }}</td>
                <td>{{ $pv->tipo_ponto == 0 ? "Embarque" : "Desembarque" }}</td>
                <td>
                    <form action="/pontos-viagem/remover/{{ $pv->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Remover
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

@endsection