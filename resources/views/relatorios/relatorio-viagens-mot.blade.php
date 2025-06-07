<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Viagens</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .tabela {
            width: 100%;
            border-collapse: collapse;
        }
        .tabela th, .tabela td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .tabela th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="titulo">Relatório de Viagens</div>
<p>Data: {{ date('d/m/Y') }}</p>

<table class="tabela">
    <thead>
        <tr>
            <th>Data</th>
            <th>Paciente</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Veículo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dados as $s)
            <tr>
                <td>{{ $s->data->format('d/m/Y') }}</td>
                <td>{{ $s->paciente->nome ?? '-' }}</td>    
                <td>{{ $s->destino }}</td>
                <td>{{ $s->situacao }}</td>
                <td>{{ $s->ponto->nome ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>