@extends('layout')

@section('conteudo')

<form method="post" action="/administradores/{{ $administrador->id }}">

    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo:</label>
        <input type="text" id="nome" name="nome" value="{{ $administrador->nome }}" class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="cargo_id" class="form-label">Selecione o cargo:</label>
        <select id="cargo_id" name="cargo_id" class="form-select" required="" disabled>
            @foreach ($cargos as $c)
                <option value="{{ $c->id }}" {{ $administrador->cargo_id == $c->id ? "selected" : "" }}>
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="celular" class="form-label">Número de celular:</label>
        <input type="text" id="celular" name="celular" value="{{ $administrador->celular }}"  class="form-control" required="" disabled>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Endereço de e-mail:</label>
        <input type="email" id="email" name="email" value="{{ $administrador->email }}" class="form-control" required="" disabled>
    </div>

    <p>Deseja excluir o registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="/administradores" class="btn btn-primary">Cancelar</a>
</form>

@endsection