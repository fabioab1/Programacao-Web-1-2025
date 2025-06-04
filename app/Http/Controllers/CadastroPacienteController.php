<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CadastroPacienteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cadastro-paciente");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $dados = $request->all();
            $user['name'] = $request->input('nome');
            $user['email'] = $request->input('email');
            $user['password'] = Hash::make($dados['password']);
            $user['role'] = 'PAC';
            $user = User::create($user);
            $dados['user_id'] = $user->id;
            Paciente::create($dados);
            return redirect()->route('login');
           
        } catch (Exception $e){
            Log::error("Erro ao cadastrar o paciente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('pacientes.index')
                ->with('erro', 'Erro ao cadastrar o paciente!');
        }
    }

}
