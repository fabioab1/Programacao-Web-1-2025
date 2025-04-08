<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cidade;
use Exception;
use Illuminate\Support\Facades\Log;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cidades = Cidade::all();
        return view("cidades.index", compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cidades.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Cidade::create($request->all());
            return redirect()->route('cidades.index')
                ->with('sucesso', 'Cidade cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao cadastrar a cidade: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('cidades.index')
                ->with('erro', 'Erro ao cadastrar a cidade!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cidade = Cidade::findOrFail($id);
        return view("cidades.show", compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cidade = Cidade::findOrFail($id);
        return view("cidades.edit", compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            $cidade->update($request->all());
            return redirect()->route('cidades.index')->with('sucesso', 'Cadastro editado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao editar o cadastro da cidade: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cidade_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('cidades.index')->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            $cidade->delete();
            return redirect()->route('cidades.index')->with('sucesso', 'Cidade deletada com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao deletar a cidade: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cidade_id' => $id
            ]);
            return redirect()->route('cidades.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
