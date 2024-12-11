<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('centro_custos')) {
            Schema::create('centro_custos', function (Blueprint $table) {
                $table->bigIncrements('id_centro_custo');
                $table->string('nm_centro_custo', 100);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('centro_custos');
    }
};