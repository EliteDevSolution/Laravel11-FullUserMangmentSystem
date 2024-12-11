<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('fornecedores')) {
            Schema::create('fornecedores', function (Blueprint $table) {
                $table->bigIncrements('id_fornecedor');
                $table->foreignId('id_tp_pessoa');
                $table->string('nm_fornecedor', 100);
                $table->string('nm_documento', 100);
                $table->string('nm_codigo', 100);
                $table->string('nm_razao_social', 200)->nullable();
                $table->string('nm_social', 200)->nullable();
                $table->string('nm_endereco', 200)->nullable();
                $table->string('nr_endereco', 45)->nullable();
                $table->string('nm_complemento', 100)->nullable();
                $table->string('nm_estado', 2)->nullable();
                $table->string('nm_municipio', 100)->nullable();
                $table->string('nm_cep', 20)->nullable();
                $table->string('nr_telefone', 20)->nullable();
                $table->string('nm_email', 100)->nullable();
                $table->string('cd_banco', 10)->nullable();
                $table->string('nm_banco', 100)->nullable();
                $table->string('nr_agencia', 10)->nullable();
                $table->string('nr_conta', 20)->nullable();
                $table->string('nm_chave_pix', 100)->nullable();
                $table->string('nm_dados_bancarios_internacional', 500)->nullable();
                $table->dateTime('dt_cadastro');
                $table->integer('id_usuario_cadastro');
                $table->dateTime('dt_atualizacao');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};