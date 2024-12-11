<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('clientes')) {
            Schema::create('clientes', function (Blueprint $table) {
                $table->bigIncrements('id_cliente');
                $table->unsignedBigInteger('id_tipo_pessoa');
                $table->string('nm_cliente', 100);
                $table->string('nm_email', 100);
                $table->string('nr_telefone', 50);
                $table->string('nm_documento', 100);
                $table->string('nm_codigo', 100);
                $table->string('nm_razao_social', 200)->nullable();
                $table->string('nm_endereco', 200)->nullable();
                $table->string('nr_endereco', 50)->nullable();
                $table->string('nm_complemento', 100)->nullable();
                $table->string('nm_cep', 50);
                $table->string('nm_municipio', 100);
                $table->string('nm_estado', 10);
                $table->string('dt_cadastro');
                $table->unsignedBigInteger('id_usuario_cadastro');
                $table->string('dt_atualizacao')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};