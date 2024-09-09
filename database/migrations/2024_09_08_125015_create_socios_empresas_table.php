<?php

use App\Enums\InativoGeral;
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
        Schema::create('socio_empresas', function (Blueprint $table) {
            $table->bigIncrements('id'); // Chave primária definida aqui
            $table->unsignedBigInteger('empresas_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['Ativado', 'Desativado'])->default('Ativado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_empresas');
    }
};
