<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('filial_bancos')) {
            Schema::create('filial_bancos', function (Blueprint $table) {
                $table->bigIncrements('id_filial_banco');
                $table->unsignedBigInteger('id_filial');
                $table->string('cd_banco', 50);
                $table->string('nm_banco', 50);
                $table->string('nr_agencia', 50);
                $table->string('nr_conta', 50);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->string('dt_alteracao')->nullable();
                $table->string('fl_filial_bancario', 10);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('filial_bancos');
    }
};