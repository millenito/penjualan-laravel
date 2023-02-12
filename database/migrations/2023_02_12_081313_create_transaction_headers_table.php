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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 3);
            $table->string('document_number', 10)->unique();
            $table->string('user', 10)->unique();
            $table->float('total');
            $table->foreign('user')->references('user_code')->on('users');
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
        Schema::dropIfExists('transaction_headers');
    }
};
