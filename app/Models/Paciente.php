<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cns', 'cpf', 'celular', 'email', 'dataNasc', 'logradouro', 'numero', 'bairro', 'cidade', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

}
