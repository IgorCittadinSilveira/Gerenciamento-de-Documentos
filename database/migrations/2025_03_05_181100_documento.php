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
        Schema::create('documento', function (Blueprint $table) {
            $table->id(); // id Primária com auto incremento
            $table->string('nome', 255); // Nome
            $table->string('categoria', 255); // Categoria
            $table->string('localizacao', 255); // Localização
            $table->date('data'); // Data
            $table->boolean('publico')->default(true);
            $table->string('arquivo', 255);
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
