<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;
use App\Models\Cargo;
use Exception;
use Illuminate\Support\Facades\Log;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = Administradores::with('cargo')->get();
        return view("administradores.index", compact('administradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::all();
        return view("administradores.create", compact("cargos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Administradores::create($request->all());
            return redirect()->route('administradores.index')
                ->with('sucesso', 'Administrador cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar o administrador: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('administradores.index')
                ->with('erro', 'Erro ao cadastrar o administrador!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $administrador = Administradores::findOrFail($id);
        $cargos = Cargo::all();
        return view("administradores.show", compact('administrador', 'cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administrador = Administradores::findOrFail($id);
        $cargos = Cargo::all();
        return view("administradores.edit", compact('administrador', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $administrador = Administradores::findOrFail($id);
            $administrador->update($request->all());
            return redirect()->route('administradores.index')->with('sucesso', 'Cadastro editado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do administrador: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'administrador_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('administradores.index')->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $administrador = Administradores::findOrFail($id);
            $administrador->delete();
            return redirect()->route('administradores.index')->with('sucesso', 'Administrador deletado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao deletar o administrador: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id
            ]);
            return redirect()->route('administradores.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
