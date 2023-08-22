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
        Schema::create('event_registers', function (Blueprint $table) {
            $table->id();
            $table->integer('self')->nullable();
            $table->integer('guest')->nullable();
            $table->integer('driver')->nullable();
            $table->integer('spouse')->nullable();
            $table->integer('child_above')->nullable();
            $table->integer('child_bellow')->nullable();

            $table->integer('total_person')->nullable();
            $table->double('total_amount')->nullable();
            
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('payment_details_id');
            $table->foreign('payment_details_id')->references('id')->on('payment_details')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('event_registers');
    }
};
