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
        Schema::create('grade_lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')
                ->constrained('grades')
                ->onDelete('cascade')
                ->onUpdate('NO ACTION');
            $table->foreignId('lecture_id')
                ->constrained('lectures')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
            $table->integer('curriculum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_lectures');
    }
};
