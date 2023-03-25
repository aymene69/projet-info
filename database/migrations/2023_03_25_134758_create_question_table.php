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
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('reponse');
            $table->string('reponse2');
            $table->string('reponse3');
            $table->string('reponse4');
            $table->string('indice');
            $table->string('explication');
            $table->string('questionType');
            $table->string('questionLevel');
            $table->string('questionImage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
