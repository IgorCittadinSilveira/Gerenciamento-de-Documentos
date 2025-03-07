<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoUserTable extends Migration
{
    public function up()
    {
        Schema::create('documento_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documento_id')->constrained('documento');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();

            $table->foreign('documento_id')->references('id')->on('documento')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documento_user');
    }
}
