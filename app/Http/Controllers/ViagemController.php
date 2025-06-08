<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Motorista;
use App\Models\Veiculo;
use App\Models\Viagem;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class ViagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viagens = Viagem::with('cidade', 'motorista', 'veiculo')->get();
        return view("viagens.index", compact('viagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cidades = Cidade::all();
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        return view('viagens.create', compact('cidades', 'motoristas', 'veiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Viagem::create($request->all());
            return redirect()->route('viagens.index')
                ->with('sucesso', 'Viagem criada com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao criar a viagem: '. $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('viagens.index')
                ->with('erro', 'Erro ao criar a viagem!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viagem = Viagem::findOrFail($id);
        $cidades = Cidade::all();
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        return view("viagens.show", compact('viagem', 'cidades', 'motoristas', 'veiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viagem = Viagem::findOrFail($id);
        $cidades = Cidade::all();
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        return view("viagens.edit", compact('viagem', 'cidades', 'motoristas', 'veiculos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $viagem = Viagem::findOrFail($id);
            $dados = $request->all();
            if ($dados['tipo_viagem'] == 1)
                $dados['data'] = null;
            $viagem->update($dados);
            return redirect()->route('viagens.index')->with('sucesso', 'Viagem alterada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao alterar a viagem: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'viagem_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('viagens.index')->with('erro', 'Erro ao alterar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $viagem = Viagem::findOrFail($id);
            $viagem->delete();
            return redirect()->route('viagens.index')->with('sucesso', 'Viagem deletada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao deletar a viagem: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'viagem_id' => $id
            ]);
            return redirect()->route('viagens.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
