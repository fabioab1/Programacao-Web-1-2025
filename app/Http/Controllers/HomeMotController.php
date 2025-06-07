<?php

namespace App\Http\Controllers;
use App\Models\Solicitacao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HomeMotController extends Controller
{
public function gerarRelatorio()
{
    $motoristaId = auth()->id();

    $dados = Solicitacao::with('ponto') // ajustado para carregar ponto
        ->where('id_usuario', $motoristaId)
        ->orderBy('data')
        ->get();

    $pdf = PDF::loadView('relatorios.relatorio-motorista', compact('dados'));

    return $pdf->download('relatorio_viagens_motorista.pdf');
}
}


