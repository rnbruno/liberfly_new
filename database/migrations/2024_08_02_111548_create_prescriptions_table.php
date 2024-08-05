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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('marcacoes_id');
            $table->unsignedBigInteger('medication_id');
            $table->string('dosage');
            $table->string('frequency');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('marcacoes_id')->references('id')->on('marcacoes')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
