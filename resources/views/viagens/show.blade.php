<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-PAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    @if(Auth::user())
        @include('cabecalho')
    @endif

    <div class="container my-4">

        <form method="post" action="/viagens/{{ $viagem->id }}">

            @csrf
            @method('DELETE')

            <div class="mb-3">
                <label for="cidade" class="form-label">Selecione a cidade de destino:</label>
                <select id="cidade" name="id_cidade" class="form-select" required="" disabled>
                    @foreach ($cidades as $c)
                    <option value="{{ $c->id }}" {{ $viagem->id_cidade == $c->id ? "selected" : "" }}>
                        {{ $c->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="motorista" class="form-label">Selecione o motorista:</label>
                <select id="motorista" name="id_motorista" class="form-select" required="" disabled>
                    @foreach ($motoristas as $m)
                    <option value="{{ $m->id }}" {{ $viagem->id_motorista == $m->id ? "selected" : "" }}>
                        {{ $m->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="veiculo" class="form-label">Selecione o veículo:</label>
                <select id="veiculo" name="id_veiculo" class="form-select" required="" disabled>
                    @foreach ($veiculos as $ve)
                    <option value="{{ $ve->id }}" {{ $viagem->id_veiculo == $ve->id ? "selected" : "" }}>
                        {{ $ve->placa . ' - ' . $ve->modelo }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo da viagem:</label>

                <div class="form-check ">
                    <input type="radio" id="diaria" name="tipo_viagem" class="form-check-input" value="1" {{ $viagem->tipo_viagem == 1 ? "checked" : "" }} disabled>
                    <label for="diaria" class="form-check-label">Viagem diária</label>
                </div>

                <div class="form-check ">
                    <input type="radio" id="esporadica" name="tipo_viagem" class="form-check-input" value="0" {{ $viagem->tipo_viagem == 0 ? "checked" : "" }} disabled>
                    <label for="esporadica" class="form-check-label">Viagem esporádica</label>
                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">Selecione os dias em que a viagem se repete:</label>

                <input type="hidden" name="domingo" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="domingo" name="domingo" value="1" class="form-check-input" {{ $viagem->domingo == 1 ? "checked" : "" }} disabled>
                    <label for="domingo" class="form-check-label">Domingo</label>
                </div>

                <input type="hidden" name="segunda" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="segunda" name="segunda" value="1" class="form-check-input" {{ $viagem->segunda == 1 ? "checked" : "" }} disabled>
                    <label for="segunda" class="form-check-label">Segunda-feira</label>
                </div>

                <input type="hidden" name="terca" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="terca" name="terca" value="1" class="form-check-input" {{ $viagem->terca == 1 ? "checked" : "" }} disabled>
                    <label for="terca" class="form-check-label">Terça-feira</label>
                </div>

                <input type="hidden" name="quarta" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="quarta" name="quarta" value="1" class="form-check-input" {{ $viagem->quarta == 1 ? "checked" : "" }} disabled>
                    <label for="quarta" class="form-check-label">Quarta-feira</label>
                </div>

                <input type="hidden" name="quinta" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="quinta" name="quinta" value="1" class="form-check-input" {{ $viagem->quinta == 1 ? "checked" : "" }} disabled>
                    <label for="quinta" class="form-check-label">Quinta-feira</label>
                </div>

                <input type="hidden" name="sexta" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="sexta" name="sexta" value="1" class="form-check-input" {{ $viagem->sexta == 1 ? "checked" : "" }} disabled>
                    <label for="sexta" class="form-check-label">Sexta-feira</label>
                </div>

                <input type="hidden" name="sabado" value="0">
                <div class="form-check ">
                    <input type="checkbox" id="sabado" name="sabado" value="1" class="form-check-input" {{ $viagem->sabado == 1 ? "checked" : "" }} disabled>
                    <label for="sabado" class="form-check-label">Sábado</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data da viagem:</label>
                <input type="date" id="data" name="data" class="form-control" value="{{ $viagem->tipo_viagem == 1 ? '' : $viagem->data}}" disabled>
            </div>

            <div class="mb-3">
                <label for="horario_embarque" class="form-label">Horário de embarque:</label>
                <input type="time" id="horario_embarque" name="horario_embarque" class="form-control" value="{{ $viagem->horario_embarque }}" required="" disabled>
            </div>

            <div class="mb-3">
                <label for="horario_saida" class="form-label">Horário de saída:</label>
                <input type="time" id="horario_saida" name="horario_saida" class="form-control" value="{{ $viagem->horario_saida }}" required="" disabled>
            </div>

            <div class="mb-3">
                <label for="horario_chegada" class="form-label">Horário de chegada:</label>
                <input type="time" id="horario_chegada" name="horario_chegada" class="form-control" value="{{ $viagem->horario_chegada }}" required="" disabled>
            </div>

            <p>Deseja excluir o registro?</p>
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="/viagens" class="btn btn-primary">Cancelar</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>