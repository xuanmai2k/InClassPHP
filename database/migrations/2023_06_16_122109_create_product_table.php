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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->float('price')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->string('image_url', 255)->nullable();
            //bước 1: tạo field
            $table->unsignedbigInteger('product_category_id');
            //bước 2: đi chỉ định field đó là khóa ngoại
            $table->foreign('product_category_id')->references('id')->on('product_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
