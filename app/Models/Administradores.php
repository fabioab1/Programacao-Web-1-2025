<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cargo_id', 'celular', 'email', 'user_id'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
