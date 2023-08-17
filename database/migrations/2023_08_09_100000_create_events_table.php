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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->date('event_date')->nullable();
            $table->integer('self')->nullable();
            $table->integer('guest')->nullable();
            $table->integer('driver')->nullable();
            $table->integer('spouse')->nullable();
            $table->integer('child_above')->nullable();
            $table->integer('child_bellow')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('status')->default(false);
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
        Schema::dropIfExists('events');
    }
};
