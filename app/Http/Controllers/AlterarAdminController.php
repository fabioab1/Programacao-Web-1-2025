<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\User;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class AlterarAdminController extends Controller
{
    public function edit($id)
    {
        $administrador = Administradores::where('user_id', $id)->first();
        $cargos = Cargo::all();

        return view ("alterar-dados-adm", compact('administrador', 'cargos'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $admin = Administradores::findOrFail($id);
            $admin->update($request->all());
            $user = User::findOrFail($admin->user_id);
            $user->name = $request->input['nome'];
            $user->email = $request->input['email'];
            $user->password = $request->input['password'];
            $user->save();
            return redirect()->route('inicio')->with('sucesso', 'Dados alterados com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'administrador_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('inicio')->with('erro', 'Erro ao editar!');
        }
    }
}
