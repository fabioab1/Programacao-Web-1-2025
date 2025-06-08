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
        Schema::create('viagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cidade'); // Cidade destino
            $table->unsignedBigInteger('id_motorista');
            $table->unsignedBigInteger('id_veiculo');
            $table->boolean('tipo_viagem'); // False para viagem esporádica e true para viagem diária
            $table->date('data')->nullable(); // Caso seja uma viagem esporádica (para uma data específica)
            $table->boolean('segunda'); // Caso seja uma viagem diária (irá se repetir)
            $table->boolean('terca'); // Os dias que a viagem irá se repetir
            $table->boolean('quarta');
            $table->boolean('quinta');
            $table->boolean('sexta');
            $table->boolean('sabado');
            $table->boolean('domingo');
            $table->time('horario_embarque');
            $table->time('horario_saida');
            $table->time('horario_chegada');
            $table->foreign('id_cidade')->references('id')
                ->on('cidades')->onDelete('restrict');
            $table->foreign('id_motorista')->references('id')
                ->on('motoristas')->onDelete('restrict');
            $table->foreign('id_veiculo')->references('id')
                ->on('veiculos')->onDelete('restrict');
            // Pontos de embarque
            // Pontos de desembarque

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagems');
    }
};
