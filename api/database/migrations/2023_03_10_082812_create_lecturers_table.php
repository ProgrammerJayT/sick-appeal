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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->integer('lecturer_id')->primary();
            $table->integer('account_id');
            $table->integer('course_id');
            $table->string('name');
            $table->string('surname');
            $table->timestamps();

            //Constraints
            $table->foreign('account_id')->references('account_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('course_id')->references('course_id')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};