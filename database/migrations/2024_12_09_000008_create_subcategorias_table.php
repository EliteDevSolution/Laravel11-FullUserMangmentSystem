<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('subcategorias')) {
            Schema::create('subcategorias', function (Blueprint $table) {
                $table->bigIncrements('id_subcategoria');
                $table->string('nm_subcategoria', 100);
                $table->string('cd_subcategoria', 50);
                $table->string('nm_descricao', 200);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategorias');
    }
};