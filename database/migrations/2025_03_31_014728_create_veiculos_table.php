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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 7)->unique();
            $table->string('nome', 45);
            $table->string('modelo', 45);
            $table->integer('ano');
            $table->string('marca', 45);
            $table->string('tipo', 45);
            $table->string('cor', 45);
            $table->integer('capacidade');
            $table->string('situacao', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
