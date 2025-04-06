<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Exception;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view("pacientes.index", compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pacientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Paciente::create($request->all());
            return redirect()->route('pacientes.index')
                ->with('sucesso', 'Paciente cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar o paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('pacientes.index')
                ->with('erro', 'Erro ao cadastrar o paciente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view ("pacientes.show", compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view ("pacientes.edit", compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $paciente = Paciente::findOrFail($id);
            $paciente->update($request->all());
            return redirect()->route('pacientes.index')->with('sucesso', 'Cadastro editado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'paciente_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('pacientes.index')->with('erro', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();
            return redirect()->route('pacientes.index')->with('sucesso', 'Paciente deletado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao deletar o paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'paciente_id' => $id
            ]);
            return redirect()->route('pacientes.index')->with('erro', 'Erro ao deletar!');
        }
    }
}
