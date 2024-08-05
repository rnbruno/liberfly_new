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
        Schema::create('animals_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('breed')->nullable();
            $table->unsignedBigInteger('type_animals_id');
            $table->integer('age')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->uuid('user_id'); // Chave estrangeira UUID
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_animals_id')->references('id')->on('type_animals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals_user');
    }
};
