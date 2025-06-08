<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontosViagem extends Model
{
    use HasFactory;
    protected $fillable = ['viagem_id', 'ponto_id', 'tipo_ponto'];

    public function viagem()
    {
        return $this->belongsTo(Viagem::class);
    }

    public function ponto()
    {
        return $this->belongsTo(Ponto::class);
    }
}
