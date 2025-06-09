<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Viagem;
use Illuminate\Support\Facades\Auth;

class HomeMotController extends Controller
{

public function relatorioViagens()
{
    $userId = Auth::id();

    // Pega o motorista associado ao usuário logado
    $motorista = \App\Models\Motorista::where('user_id', $userId)->first();

    if (!$motorista) {
        return view('viagens.relatorio-viagem', ['viagens' => collect()]);
    }

    $viagens = \App\Models\Viagem::with('cidade', 'veiculo')
        ->where('id_motorista', $motorista->id)
        ->orderBy('data', 'desc')
        ->get();

    return view('viagens.relatorio-viagem', compact('viagens'));
}

public function relatorioPacientes()
{
    $userId = Auth::id();
    $motorista = \App\Models\Motorista::where('user_id', $userId)->first();

    if (!$motorista) {
        return view('viagens.relatorio-pacientes', ['solicitacoes' => collect()]);
    }

    // Buscar as viagens do motorista
    $viagensIds = \App\Models\Viagem::where('id_motorista', $motorista->id)->pluck('id');

    // Buscar os pontos vinculados às viagens do motorista
    $pontosIds = \App\Models\PontosViagem::whereIn('viagem_id', $viagensIds)->pluck('ponto_id');

    // Buscar as solicitações que usam esses pontos
    $solicitacoes = \App\Models\Solicitacao::with('user', 'ponto')
        ->whereIn('ponto_id', $pontosIds)
        ->orderBy('data', 'desc')
        ->get();

    return view('viagens.relatorio-pacientes', compact('solicitacoes'));
}

}
