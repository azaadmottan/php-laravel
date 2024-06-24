<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mentees', function (Blueprint $table) {
            $table->id();
            $table->string('menteeName', 255);
            $table->string('rollNo', 255)->unique();
            $table->string('course', 255);
            $table->string('branch', 255);
            $table->string('semester', 255);
            $table->unsignedBigInteger('mentor')->nullable();
            $table->foreign('mentor')->references('id')->on('mentors');
            $table->string('phone', 255);
            $table->string('email', 255)->unique();
            $table->string('fatherName', 255);
            $table->string('fatherPhone', 255);
            $table->string('fatherProfession', 255);
            $table->text('address');
            $table->string('profilePicture');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentees');
    }
};
