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
        Schema::create('product_variant_default_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variants_id')->nullable();
            $table->foreign('product_variants_id')->references('id')->on('product_variants');
            $table->text('value')->nullable();
            $table->decimal('price', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_default_value');
    }
};
