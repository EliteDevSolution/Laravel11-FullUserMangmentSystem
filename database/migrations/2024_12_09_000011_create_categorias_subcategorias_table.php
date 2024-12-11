<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('categoria_subcategoria')) {
            Schema::create('categoria_subcategoria', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('id_categoria');
                $table->unsignedBigInteger('id_subcategoria');
                $table->string('dt_cadadtro');
                $table->unsignedBigInteger('id_usuario_cadastro');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('categoria_subcategoria');
    }
};