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
        Schema::create('apostas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uuid')->unique();
            $table->string('nome');
            $table->unsignedBigInteger('user_id')->comment('Identificador global dos Usuarios')->nullable();
            $table->enum('status', ['A','I'])->comment('A = Ativo; I=Inativo;')->default('A');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('valor');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apostas');
    }
};
