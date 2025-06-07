<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class AlterarPacienteController extends Controller
{
    public function edit($id)
    {
        $paciente = Paciente::where('user_id', $id)->first();
        return view ("alterar-dados-pac", compact('paciente'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $paciente = Paciente::findOrFail($id);
            $paciente->update($request->all());
            $user = User::findOrFail($paciente->user_id);
            $user->name = $request->input['nome'];
            $user->email = $request->input['email'];
            $user->password = $request->input['password'];
            $user->save();
            return redirect()->route('inicio-pac')->with('sucesso', 'Dados alterados com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'paciente_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('inicio-pac')->with('erro', 'Erro ao editar!');
        }
    }
}
