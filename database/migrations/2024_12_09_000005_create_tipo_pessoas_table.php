<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('tipo_pessoas')) {
            Schema::create('tipo_pessoas', function (Blueprint $table) {
                $table->bigIncrements('id_tipo_pessoa');
                $table->string('nm_tipo_pessoa', 100);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_pessoas');
    }
};