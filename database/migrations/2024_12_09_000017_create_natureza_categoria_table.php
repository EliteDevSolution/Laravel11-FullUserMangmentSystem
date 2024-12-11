<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('natureza_categoria')) {
            Schema::create('natureza_categoria', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('id_natureza');
                $table->unsignedBigInteger('id_categoria');
                $table->string('dt_cadastro');
                $table->integer('id_usuario_cadastro');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('natureza_categoria');
    }
};