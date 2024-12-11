<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('usuario_logs')) {
            Schema::create('usuario_logs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('id_usuario_cadastro')->comment('Event user Id');
                $table->string('tipo_evento', '200')->comment('Event Type');
                $table->text('evento_conteudo')->comment('Event content');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_logs');
    }
};
