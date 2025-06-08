<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use App\Models\Solicitacao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SolicitacaoAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function exibir()
    {
        $solicitacoes = Solicitacao::with('ponto', 'user')->get();
        return view("solicitacoes-adm.index", compact('solicitacoes'));
    }

    public function aceitar(string $id)
    {
        try {
            Solicitacao::findOrFail($id)->update([
                'situacao' => 'Solicitação aceita',
                'motivo' => null,
            ]);

            return redirect()->route('solicitacoes-adm')
                ->with('sucesso', 'Solicitação aceita!');
        } catch (Exception $e) {
            Log::error('Erro ao aceitar a solicitação: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'solicitacao_id' => $id,
            ]);
            return redirect()->route('solicitacoes-adm')
                ->with('erro', 'Erro ao aceitar a solicitação!');
        }
    }

    public function recusar(Request $request, string $id)
    {
        try {
            Solicitacao::findOrFail($id)->update([
                'situacao' => 'Solicitação recusada',
                'motivo' => $request->motivo
            ]);

            return redirect()->route('solicitacoes-adm')
                ->with('sucesso', 'Solicitação recusada!');
        } catch (Exception $e) {
            Log::error('Erro ao recusar a solicitação: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'solicitacao_id' => $id,
                'motivo' => $request->motivo
            ]);

            return redirect()->route('solicitacoes-adm')
                ->with('erro', 'Erro ao recusar a solicitação!');
        }
    }
}
