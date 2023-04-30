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
        Schema::create('lecturer_registrations', function (Blueprint $table) {
            $table->integer('lecturer_registration_id')->autoIncrement();
            $table->integer('lecturer_id');
            $table->integer('registration_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturer_registrations');
    }
};