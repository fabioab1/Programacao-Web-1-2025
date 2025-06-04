<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorista;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditarMotoristaController extends Controller
{
    public function edit(string $id)
    {
        $motorista = Motorista::findOrFail($id);
        return view("editar-motorista", compact('motorista'));
    }

    public function store(Request $request)
    {
        try{
            $dados = $request->all();
            $user['name'] = $request->input('nome');
            $user['email'] = $request->input('email');
            $user['password'] = Hash::make($dados['password']);
            $user['role'] = 'MOT';
            $user = User::create($user);
            $dados['user_id'] = $user->id;
            Motorista::create($dados);
            return redirect()->route('inicio-mot')
                ->with('sucesso', 'Motorista cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar o motorista: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('inicio-mot')
                ->with('erro', 'Erro ao cadastrar o motorista!');
        }
    }

    public function update(Request $request, string $id)
    {
        try{
            $motorista = Motorista::findOrFail($id);
            $motorista->update($request->all());
            $user = User::findOrFail($motorista->user_id);
            $user->name = $request->input['nome'];
            $user->email = $request->input['email'];
            $user->password = $request->input['password'];
            $user->save();
            return redirect()->route('motoristas.index')->with('sucesso', 'Cadastro editado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao editar o cadastro do motorista: ".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'motorista_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('motoristas.index')->with('erro', 'Erro ao editar!');
        }
    }
}
