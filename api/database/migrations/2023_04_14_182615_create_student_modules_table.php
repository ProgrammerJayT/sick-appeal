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
        Schema::create('student_modules', function (Blueprint $table) {
            $table->integer('student_module_id')->autoIncrement();
            $table->integer('student_id');
            $table->integer('module_id');
            $table->integer('lecturer_id');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_modules');
    }
};
