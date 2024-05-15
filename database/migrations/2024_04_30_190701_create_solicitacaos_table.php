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
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('setor_requerente');
            $table->text('justificativa');
            // Itens e seus detalhes
            for ($i = 1; $i <= 6; $i++) {
                $table->string("item$i")->nullable();
                $table->integer("quantidade$i")->nullable();
                $table->string("unidade$i")->nullable();
                $table->text("descricao$i")->nullable();
                $table->string("fornecedor$i")->nullable();
            }
            $table->date('data_pedido');
            $table->date('data_esperada');
            $table->string('recebido_nome')->nullable();
            $table->date('recebido_data')->nullable();
            $table->string('solicitante');
            $table->string('solicita_cargo');
            $table->text('observacoes')->nullable();
            $table->string('estado');
            $table->string('tipo');
            $table->string('prioridade');
            $table->string('referencia');
            $table->date('indicadorcotaçao')->nullable();
            $table->date('indicadoraprovacao')->nullable();
            $table->date('indicadorconcluido')->nullable();
            $table->text('observacoescompras')->nullable();
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
