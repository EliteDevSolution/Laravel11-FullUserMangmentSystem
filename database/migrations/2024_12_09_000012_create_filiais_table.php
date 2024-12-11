<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('filiais')) {
            Schema::create('filiais', function (Blueprint $table) {
                $table->bigIncrements('id_filial');
                $table->unsignedBigInteger('id_tipo_filial');
                $table->string('nm_filial', 100);
                $table->string('nm_documento', 100);
                $table->string('nm_codigo', 100);
                $table->string('nm_razao_social', 200);
                $table->string('nm_social', 200);
                $table->string('nr_telefone', 50);
                $table->string('nm_email', 100);
                $table->string('nm_endereco', 200);
                $table->string('nr_endereco', 10);
                $table->string('nm_complemento', 50);
                $table->string('nm_cep', 50);
                $table->string('nm_municipio', 100);
                $table->string('nm_estado', 10);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->string('dt_alteracao')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('filiais');
    }
};