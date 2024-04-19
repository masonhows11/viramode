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
        Schema::create('suggestion_products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('image_path')->nullable();
            $table->string('slug')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestion_products');
    }
};
