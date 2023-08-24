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
        Schema::create('annual_fees', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('fine', 10, 2)->nullable();
            $table->decimal('due_amount', 10, 2)->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable();

            $table->unsignedBigInteger('fee_plan_id')->nullable();
            $table->unsignedBigInteger('payment_details_id');
            $table->foreign('payment_details_id')->references('id')->on('payment_details')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('annual_fees');
    }
};
