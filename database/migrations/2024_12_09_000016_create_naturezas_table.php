<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('naturezas')) {
            Schema::create('naturezas', function (Blueprint $table) {
                $table->bigIncrements('id_natureza');
                $table->string('nm_natureza', 100);
                $table->string('cd_natureza', 10);
                $table->string('nm_descricao', 200);
                $table->unsignedBigInteger('id_status');
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('naturezas');
    }
};