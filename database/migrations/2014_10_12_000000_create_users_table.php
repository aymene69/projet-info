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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('score')->default(0);
            $table->string('nbParties')->default(0);
            $table->string('nbVictoires')->default(0);
            $table->string('nbDefaites')->default(0);
            $table->string('nbIndices')->default(5);
            $table->string('nbIndicesUtilises')->default(0);
            $table->string('adminRole')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
