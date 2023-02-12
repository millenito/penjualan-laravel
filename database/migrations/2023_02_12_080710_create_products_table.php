<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 18)->unique();
            $table->string('product_name', 30);
            $table->string('product_image')->nullable();
            $table->float('price');
            $table->string('currency', 5)->default('IDR');
            $table->float('discount')->nullable();
            $table->string('dimension', 50)->nullable();
            $table->string('unit', 5)->default('PCS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
