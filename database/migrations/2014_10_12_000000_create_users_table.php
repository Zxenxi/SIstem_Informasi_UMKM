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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            // Definisikan primary key sebagai unsignedInteger
            $table->smallInteger('id', true); // True mengindikasikan auto-increment
            $table->string('name', 100); // Panjang maksimal 100 karakter
            $table->string('email', 150)->unique(); // Panjang maksimal 150 karakter
            $table->string('phone_number', 20)->unique(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100); // Panjang maksimal 60 karakter
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};