<?php

namespace App\Http\Controllers;


use App\Models\Veiculo;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Veiculo::create($request->all());

        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');
        {
            try{
                Veiculo::create($request->all());
                return redirect()->route('veiculos.index')
                    ->with('sucesso', 'Veiculo inserido com sucesso!');
    
            } catch (Exception $e){
                Log::error("Erro ao criar o produto: ". $e->getMessage(), [
                    'stack' => $e->getTraceAsString(), 
                    'request' => $request->all()
                ]);
                return redirect()->route('veiculos.index')
                    ->with('erro', 'Erro ao criar o veiculo!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
            $veiculo = Veiculo::findOrFail($id);
            return view('veiculos.show', compact('veiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $veiculo = Veiculo::findOrFail($id);
            $veiculo->update($request->all());
            return redirect()->route('veiculos.index')
            ->with('successo', 'Veículo atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar o veículo: " . $e->getMessage(), [
            'stack' => $e->getTraceAsString(),
            'veiculo_id' => $id,
            'request' => $request->all()
            ]);
            return redirect()->route('veiculos.index')
            ->with('error', 'Erro ao atualizar o veículo!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $veiculo = Veiculo::findOrFail($id);
            $veiculo->delete();
            return redirect()->route('veiculos.index')
            ->with('successo', 'Veículo excluído com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir o veículo: " . $e->getMessage(), [
            'stack' => $e->getTraceAsString(),
            'veiculo_id' => $id
            ]);
            return redirect()->route('veiculos.index')
            ->with('error', 'Erro ao excluir o veículo!');
        }
    }
}
