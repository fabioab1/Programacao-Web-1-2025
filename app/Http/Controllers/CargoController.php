<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Facades\Log;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
        return view("cargos.index", compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cargos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Cargo::create($request->all());
            return redirect()->route('cargos.index')
                ->with('sucesso', 'Cargo cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao criar o cargo: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('cargos.index')
                ->with('erro', 'Erro ao criar o cargo!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        return view("cargos.show", compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        return view("cargos.edit", compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $cargo = Cargo::findOrFail($id);
            $cargo->update($request->all());
            return redirect()->route('cargos.index')->with('sucesso', 'Cargo alterado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao atualizar o cargo: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cargo_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('cargos.index')->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $cargo = Cargo::findOrFail($id);
            $cargo->delete();
            return redirect()->route('cargos.index')->with('sucesso', 'Cargo deletado com sucesso!');
        } catch(Exception $e){
            Log::error("Erro ao deletar o cargo: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cargo_id' => $id
            ]);
            return redirect()->route('cargos.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
