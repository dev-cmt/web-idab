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
        Schema::create('info_documents', function (Blueprint $table) {
            $table->id();
            $table->string('trade_licence')->nullable();
            $table->string('tin_certificate')->nullable();
            $table->string('nid_photo_copy')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('edu_certificate')->nullable();
            $table->string('experience_certificate')->nullable();
            $table->string('stu_id_copy')->nullable();
            $table->string('recoment_letter')->nullable();
            
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
        Schema::dropIfExists('info_documents');
    }
};
