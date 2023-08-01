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
        Schema::create('info_academics', function (Blueprint $table) {
            $table->id();
            $table->string('collage')->nullable();
            $table->string('subject')->nullable();
            $table->integer('passing_year')->nullable();
            $table->integer('degree')->nullable();
            // $table->enum('degree', ['12th Stander', 'Graduation', 'Masters', 'PSD']);
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_academics');
    }
};
