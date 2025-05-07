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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_cpf');
            $table->foreign('user_cpf')
            ->references('cpf')
            ->on('users')
            ->onDelete('cascade');
            $table->string('street');
            $table->string('number', 10);
            $table->string('district');
            $table->string('city');
            $table->char('zip_code', 8);
            $table->char('state', 2);
            $table->foreign('state')
            ->references('uf')
            ->on('states')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
