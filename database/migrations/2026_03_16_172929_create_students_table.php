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
        Schema::create('students', function (Blueprint $table) {
            // Laravel በራሱ ቁጥር እንዳይሰጥ $table->id() የሚለውን አጥፍተነዋል
            // በምትኩ አንተ የምታስገባው 'student_id' ዋናው መለያ (Primary Key) ይሆናል
            $table->string('student_id')->primary();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('national_id')->unique();
            $table->string('department');
            $table->decimal('gpa', 3, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
