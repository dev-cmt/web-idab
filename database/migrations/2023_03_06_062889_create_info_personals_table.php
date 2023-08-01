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
        Schema::create('info_personals', function (Blueprint $table) {
            $table->id();
            $table->date('dob')->nullable();
            $table->integer('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('marrital_status')->nullable();
            $table->string('spouse')->nullable();
            $table->date('birth_day')->nullable();
            $table->integer('number_child')->nullable();

            $table->integer('em_name')->nullable();
            $table->integer('em_phone')->nullable();
            $table->integer('em_rleation')->nullable();
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
        Schema::dropIfExists('info_personals');
    }
};
