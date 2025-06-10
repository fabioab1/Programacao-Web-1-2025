<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Paciente;
use App\Models\PontosViagem;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use App\Models\Viagem;
use Illuminate\Support\Facades\Auth;

class HomeMotController extends Controller
{

public function relatorioViagens()
{
    $userId = Auth::id();

    // Pega o motorista associado ao usuário logado
    $motorista = Motorista::where('user_id', $userId)->first();

    if (!$motorista) {
        return view('viagens.relatorio-viagem', ['viagens' => collect()]);
    }

    $viagens = Viagem::with('cidade', 'veiculo')
        ->where('id_motorista', $motorista->id)
        ->orderBy('data', 'desc')
        ->get();

    $solicitacoes = Solicitacao::with('ponto', 'paciente')->get();

    return view('viagens.relatorio-viagem', compact('viagens', 'solicitacoes'));
}

public function relatorioPacientes()
{
    $userId = Auth::id();
    $motorista = Motorista::where('user_id', $userId)->first();

    if (!$motorista) {
        return view('viagens.relatorio-pacientes', ['solicitacoes' => collect()]);
    }

    // Buscar as viagens do motorista
    $viagensIds = Viagem::where('id_motorista', $motorista->id)->pluck('id');

    // Buscar os pontos vinculados às viagens do motorista
    $pontosIds = PontosViagem::whereIn('viagem_id', $viagensIds)->pluck('ponto_id');

    // Buscar as solicitações que usam esses pontos
    $solicitacoes = Solicitacao::with('user', 'ponto')
        ->whereIn('ponto_id', $pontosIds)
        ->orderBy('data', 'desc')
        ->get();

    return view('viagens.relatorio-pacientes', compact('solicitacoes'));
}

}
