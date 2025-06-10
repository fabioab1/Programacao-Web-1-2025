<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'data', 'cidade', 'destino', 'ponto_id', 'nome_acompanhante', 'cpf_acompanhante', 'foto', 'situacao', 'viagem_id', 'motivo'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_usuario', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function ponto()
    {
        return $this->belongsTo(Ponto::class);
    }

    public function viagem()
    {
        return $this->belongsTo(Viagem::class);
    }
}
