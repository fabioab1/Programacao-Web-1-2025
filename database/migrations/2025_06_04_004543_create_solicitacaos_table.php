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
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->date('data');
            $table->string('destino'); // Campo que irá armazenar qual o nome do estabelecimento de saúde em que o paciente realizará o exame/consulta
            $table->unsignedBigInteger('ponto_id');
            $table->string('nome_acompanhante', 100)->nullable();
            $table->string('cpf_acompanhante', 11)->nullable();
            $table->string('foto')->nullable();
            $table->string('situacao'); // Campo que irá armazenar o estado da solicitação: aguardando análise, aceito e bloqueada, recusada
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('ponto_id')->references('id')->on('pontos')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacaos');
    }
};
