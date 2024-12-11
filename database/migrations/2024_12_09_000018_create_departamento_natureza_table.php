<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('departamento_natureza')) {
            Schema::create('departamento_natureza', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('id_departamento');
                $table->unsignedBigInteger('id_natureza');
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('departamento_natureza');
    }
};