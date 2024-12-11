<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('departamentos')) {
            Schema::create('departamentos', function (Blueprint $table) {
                $table->bigIncrements('id_departamento');
                $table->string('nm_departamento', 100);
                $table->string('cd_departamento', 50);
                $table->string('nm_descricao', 200);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->unsignedBigInteger('id_status');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};