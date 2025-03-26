<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cns', 15);
            $table->string('cpf', 11);
            $table->string('celular', 15);
            $table->string('email', 80);
            $table->date('dataNasc');
            $table->string('logradouro',60);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
