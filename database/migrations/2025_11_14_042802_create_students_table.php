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
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->string('dni', 20);
            $table->enum('academic_status', ['activo', 'retirado', 'terminado'])->default('activo');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8'])->default('1');
            $table->date('date_of_birth');
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
