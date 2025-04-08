<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'placa',
        'nome',
        'modelo',
        'ano',
        'marca',
        'tipo',
        'cor',
        'capacidade',
        'situacao'
    ];
}
