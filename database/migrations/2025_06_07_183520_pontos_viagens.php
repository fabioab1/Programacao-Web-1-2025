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
        Schema::create('pontos_viagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viagem_id');
            $table->foreign('viagem_id')->references('id')
                ->on('viagems')->onDelete('restrict');
            $table->unsignedBigInteger('ponto_id');
            $table->foreign('ponto_id')->references('id')
                ->on('pontos')->onDelete('restrict');
            $table->boolean('tipo_ponto'); // Determina se o ponto será de embarque ou desembarque
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontos_viagems');
    }
};
