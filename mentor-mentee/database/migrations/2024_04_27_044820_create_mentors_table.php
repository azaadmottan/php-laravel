<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('mentorName', 255);
            $table->string('empId', 255)->unique();
            $table->string('department', 255);
            $table->string('phone');
            $table->string('email', 255)->unique();
            $table->text('address');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('mentors');
    }
};
