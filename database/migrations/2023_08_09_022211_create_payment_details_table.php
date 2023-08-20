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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date')->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable(); // Using decimal for monetary values
            $table->string('payment_number')->nullable(); // (bKash number, Rocket number, Card last 4 digits)
            $table->string('transaction_number')->nullable(); // (payment gateway's transaction number)
            $table->unsignedBigInteger('payment_reason_id')->nullable(); // (register, event)
            $table->integer('ref_reason_id')->nullable();
            $table->string('transfer_number')->nullable(); // (Your Number)
            $table->text('message')->nullable();
            $table->string('slip')->nullable();

            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('status')->default(false); //['pending', 'completed', 'failed']
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
        Schema::dropIfExists('payment_details');
    }
};
