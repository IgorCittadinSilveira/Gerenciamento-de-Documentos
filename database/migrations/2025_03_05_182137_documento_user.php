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
        Schema::create('documento_user', function (Blueprint $table) {
            $table->id(); // id Primária
            $table->unsignedBigInteger('documento_id'); // Chave estrangeira para a tabela 'documentos'
            $table->unsignedBigInteger('user_id'); // Chave estrangeira para a tabela 'users'
            $table->timestamps(); // created_at e updated_at

            // Definindo as chaves estrangeiras
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Garantir que a combinação de documento_id e user_id seja única
            $table->unique(['documento_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_user');
    }
};
