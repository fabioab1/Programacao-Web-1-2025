<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'id_cidade', 'id_motorista', 'id_veiculo',
    'tipo_viagem', 'data', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado',
    'domingo', 'horario_embarque', 'horario_saida', 'horario_chegada'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'id_cidade');
    }

    public function motorista()
    {
        return $this->belongsTo(Motorista::class, 'id_motorista');
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'id_veiculo');
    }
}
