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
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id'); // Primary key dengan smallIncrements
            $table->string('name', 50); // Maksimal 100 karakter untuk nama produk
            $table->decimal('price', 8, 2); // Menggunakan decimal untuk harga
            $table->string('image', 255)->nullable(); // Maksimal 255 karakter untuk path gambar
            $table->text('description')->nullable(); // Menggunakan text untuk deskripsi
            $table->unsignedSmallInteger('category_id'); // Foreign key ke categories
            $table->unsignedSmallInteger('customer_id'); // Foreign key ke customers
            
            // Mendefinisikan foreign key
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};