@extends('layout')

@section('conteudo')

    <h2>Pontos</h2>

    <form method="post">

        @csrf

        <div class="mb-3">
            <label for="ponto_id" class="form-label">Selecione o ponto:</label>
            <select id="ponto_id" name="ponto_id" class="form-select" required="">
                <option value="Ponto 1">Ponto 1</option>
            </select>
        </div>

        <div class="mb-3">
            <div class="form-check ">
                <input type="radio" id="tipo_ponto" name="radio-group" class="form-check-input">
                <label for="tipo_ponto" class="form-check-label">Embarque</label>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check ">
                <input type="radio" id="tipo_ponto" name="radio-group" class="form-check-input">
                <label for="tipo_ponto" class="form-check-label">Desembarque</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>

    </form>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Nº</th>
                <th>Referência</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>1</td>
                <td>Exemplo</td>
                <td>Exemplo</td>
                <td>Exemplo</td>
                <td>Exemplo</td>
                <td>Exemplo</td>
                <td>
                    <a href="#" class="btn btn-danger">Remover</a>
                </td>
            </tr>

        </tbody>
    </table>

@endsection