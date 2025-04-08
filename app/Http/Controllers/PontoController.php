<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponto;
use Exception;
use Illuminate\Support\Facades\Log;
class PontoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pontos = Ponto::all();
        return view("pontos.index", compact('pontos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pontos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Ponto::create($request->all());
            return redirect()->route('pontos.index')
                ->with('sucesso', 'Ponto cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao cadastrar o ponto: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('pontos.index')
                ->with('erro', 'Erro ao cadastrar o ponto!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ponto = Ponto::findOrFail($id);
        return view("pontos.show", compact('ponto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ponto = Ponto::findOrFail($id);
        return view("pontos.edit", compact('ponto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $ponto = Ponto::findOrFail($id);
            $ponto->update($request->all());
            return redirect()->route('pontos.index')->with('sucesso', 'Ponto atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar o ponto: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'ponto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('pontos.index')->with('erro', 'Erro ao atualizar o ponto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ponto = Ponto::findOrFail($id);
            $ponto->delete();
            return redirect()->route('pontos.index')->with('sucesso', 'Ponto deletado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao deletar o ponto: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'ponto_id' => $id
            ]);
            return redirect()->route('pontos.index')->with('erro', 'Erro ao deletar o ponto!');
        }
    }
}
