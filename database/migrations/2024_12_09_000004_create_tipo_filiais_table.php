<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('tipo_filiais')) {
            Schema::create('tipo_filiais', function (Blueprint $table) {
                $table->bigIncrements('id_tipo_filial');
                $table->string('nm_tipo_filial', 100);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_filiais');
    }
};