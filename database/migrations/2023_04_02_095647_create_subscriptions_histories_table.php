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
        Schema::create('subscriptions_histories', function (Blueprint $table) {
            $table->id();
            $table->date('sub_month')->nullable();
            $table->date('pay_date')->nullable();
            $table->integer('amount')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('subscriptions_id')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('subscriptions_histories');
    }
};
