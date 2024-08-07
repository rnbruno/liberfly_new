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
        Schema::create('marcacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animals_user_id');
            $table->integer('medical_id')->nullable();
            $table->string('reason')->nullable();
            $table->integer('horario_disponivel_id')->nullable();
            $table->boolean('excluido');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('animals_user_id')->references('id')->on('animals_user')->onDelete('cascade');
            // $table->foreign('medical_id')->references('id')->on('medical')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcacoes');
    }
};
