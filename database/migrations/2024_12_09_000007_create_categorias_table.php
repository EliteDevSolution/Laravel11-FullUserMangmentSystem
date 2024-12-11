<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('categorias')) {
            Schema::create('categorias', function (Blueprint $table) {
                $table->bigIncrements('id_categoria');
                $table->string('nm_categoria', 100);
                $table->string('cd_categoria', 50);
                $table->string('nm_descricao', 200);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};