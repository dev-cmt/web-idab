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
        Schema::create('payment_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->unsignedBigInteger('payment_reason_id');
            $table->foreign('payment_reason_id')->references('id')->on('payment_reasons')->onDelete('cascade');
            $table->integer('ref_reason_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(false);
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
        Schema::dropIfExists('payment_numbers');
    }
};
