<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cns', 'cpf', 'celular', 'email', 'dataNasc', 'logradouro', 'numero', 'bairro', 'cidade'];

    public function paciente()
    {
        return $this->belongsTo(paciente::class);
    }

}
