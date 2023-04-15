<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_modules', function (Blueprint $table) {
            $table->integer('course_module_id')->autoIncrement();
            $table->integer('course_id');
            $table->integer('module_id');
            $table->timestamps();

            //Table constraints
            $table->foreign('course_id')->references('course_id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('module_id')->references('module_id')->on('modules')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_modules');
    }
};