<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use App\Models\PontosViagem;
use App\Models\Viagem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PontosViagemController extends Controller
{
    public function pontosv(string $id)
    {
        $pontos = Ponto::all();
        $pontosViagem = PontosViagem::with('ponto', 'viagem')
            ->where('viagem_id', $id)
            ->get();
        return view('viagens.pontos', compact('pontosViagem', 'pontos', 'id'));
    }

    public function store(Request $request)
    {
        try {
            PontosViagem::create($request->all());
            return redirect()->route('vpontos', ['id' => $request->viagem_id])
                ->with('sucesso', 'Ponto adicionado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao adicionar o ponto: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('vpontos', ['id' => $request->viagem_id])
                ->with('erro', 'Erro ao adicionar o ponto!');
        }
    }
    
    public function destroy(string $id) {
        try {
            $pontoViagem = PontosViagem::findOrFail($id);
            $pontoViagem->delete();
            return redirect()->route('vpontos', 'id')
                ->with('sucesso', 'Ponto removido com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao remover o ponto: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'pontov_id' => $id
            ]);
            return redirect()->route('vpontos', 'id')
                ->with('erro', 'Erro ao remover!');
        } 
    }
}
