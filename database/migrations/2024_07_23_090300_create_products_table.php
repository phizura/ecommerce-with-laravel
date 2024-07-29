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
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('compare_price')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->enum('is_featured', ['Yes', 'No'])->default("No");
            $table->string('sku');
            $table->string('barcode')->nullable();
            $table->enum('track_qty', ['Yes', 'No'])->default('Yes');
            $table->integer('qty');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
