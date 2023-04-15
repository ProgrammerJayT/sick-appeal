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
        Schema::create('appeals', function (Blueprint $table) {
            $table->integer('appeal_id')->autoIncrement();
            $table->integer('test_id');
            $table->integer('student_id');
            $table->string('verdict');
            $table->timestamps();

            //Constraints
            $table->foreign('test_id')->references('test_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('student_id')->references('student_id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appeals');
    }
};