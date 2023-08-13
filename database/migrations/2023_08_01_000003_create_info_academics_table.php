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
            $table->string('institute')->nullable();
            $table->unsignedBigInteger('mast_qualification_id');
            $table->foreign('mast_qualification_id')->references('id')->on('mast_qualifications')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->integer('passing_year')->nullable();
            $table->text('other_qualification')->nullable();

            $table->tinyInteger('status')->default(false);
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
        Schema::dropIfExists('info_academics');
    }
};
