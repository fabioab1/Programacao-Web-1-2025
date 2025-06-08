<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use App\Models\PontosViagem;
use App\Models\Solicitacao;
use App\Models\Viagem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitacoes = Solicitacao::with('ponto', 'viagem')
            ->get();
        return view("solicitacoes.index", compact('solicitacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pontos = Ponto::all();
        return view('solicitacoes.create', compact("pontos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $dados = $request->all();
            if ($request->hasFile('foto')){
                $dados['foto'] = $request->file('foto')->store('solicitacoes', 'public');
            }
            Solicitacao::create($dados);
            return redirect()->route('solicitacoes.index')
                ->with('sucesso', 'Solicitação criada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao enviar a solicitação: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('solicitacoes.index')
                ->with('erro', 'Erro ao enviar a solicitação!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $solicitacao = Solicitacao::with(['viagem.cidade', 'viagem.motorista', 'viagem.motorista', 'viagem.veiculo'])->findOrFail($id);
        $pontos = Ponto::all();

        $pontosViagem = null;

        if ($solicitacao->viagem_id)
        {
            $viagemId = $solicitacao->viagem_id;
            $pontosViagem = PontosViagem::with('ponto', 'viagem')
                ->where('viagem_id', $viagemId)
                ->get();
        }

        return view("solicitacoes.show", compact('solicitacao', 'pontos', 'pontosViagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $pontos = Ponto::all();
        return view("solicitacoes.edit", compact('solicitacao', 'pontos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $solicitacao = Solicitacao::findOrFail($id);
            $dados = $request->all();
            if ($request->hasFile('foto')){
                if ($solicitacao->foto && Storage::exists('public/'.$solicitacao->foto))
                    Storage::delete('public/'.$solicitacao->foto);
                $dados['foto'] = $request->file('foto')->store('solicitacoes', 'public');
            }
            $solicitacao->update($dados);
            return redirect()->route('solicitacoes.index')
                ->with('sucesso', 'Solicitação atualizada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar a solicitação: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'ponto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('solicitacoes.index')->with('erro', 'Erro ao atualizar a solicitação!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $solicitacao = Solicitacao::findOrFail($id);
            if ($solicitacao->foto && Storage::exists('public/'.$solicitacao->foto))
                Storage::delete('public/'.$solicitacao->foto);
            $solicitacao->delete();
            return redirect()->route('solicitacoes.index')->with('sucesso', 'Solicitação deletada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao deletar a solicitação: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'ponto_id' => $id
            ]);
            return redirect()->route('solicitacoes.index')->with('erro', 'Erro ao deletar a solicitação!');
        }
    }

    public function reenviar(string $id)
    {
        try {
            Solicitacao::findOrFail($id)->update([
                'situacao' => 'Aguardando análise',
                'motivo' => null,
                'viagem_id' => null
            ]);

            return redirect()->route('solicitacoes.index')
                ->with('sucesso', 'Solicitação reenviada!');
        } catch (Exception $e) {
            Log::error('Erro ao reenviar a solicitação: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'solicitacao_id' => $id,
            ]);

            return redirect()->route('solicitacoes.index')
                ->with('erro', 'Erro ao reenviar a solicitação!');
        }
    }
}
