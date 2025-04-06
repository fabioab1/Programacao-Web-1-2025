<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorista;
use Exception;
use Illuminate\Support\Facades\Log;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = Motorista::all();
        return view("motoristas.index", compact('motoristas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("motoristas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Motorista::create($request->all());
            return redirect()->route('motoristas.index')
                ->with('sucesso', 'Motorista cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar o motorista: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('motoristas.index')
                ->with('erro', 'Erro ao cadastrar o motorista!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motorista = Motorista::findOrFail($id);
        return view("motoristas.show", compact('motorista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $motorista = Motorista::findOrFail($id);
        return view("motoristas.edit", compact('motorista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $motorista = Motorista::findOrFail($id);
            $motorista->update($request->all());
            return redirect()->route('motoristas.index')->with('sucesso', 'Cadastro editado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do motorista: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('motoristas.index')->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $motorista = Motorista::findOrFail($id);
            $motorista->delete();
            return redirect()->route('motoristas.index')->with('sucesso', 'Motorista deletado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao deletar o motorista: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'motorista_id' => $id
            ]);
            return redirect()->route('motoristas.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
