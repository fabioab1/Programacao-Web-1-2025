<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'data', 'destino', 'ponto_id', 'nome_acompanhante', 'cpf_acompanhante', 'foto', 'situacao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ponto()
    {
        return $this->belongsTo(Ponto::class);
    }
}
