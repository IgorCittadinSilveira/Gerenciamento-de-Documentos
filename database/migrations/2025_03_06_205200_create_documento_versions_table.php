<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoVersionsTable extends Migration
{
    public function up()
    {
        Schema::create('documento_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id');
            $table->string('nome');
            $table->string('localizacao');
            $table->string('categoria');
            $table->date('data');
            $table->boolean('publico');
            $table->string('arquivo');
            $table->timestamps();

            // Define a chave estrangeira para o documento
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documento_versions');
    }
}
