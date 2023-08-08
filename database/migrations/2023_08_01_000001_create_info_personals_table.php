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
            $table->string('contact_number')->nullable();
            $table->string('nid_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('present_address')->nullable();
            $table->text('parmanent_address')->nullable();
            $table->integer('gender')->default(false);
            $table->integer('blood_group')->nullable();
            $table->integer('marrital_status')->nullable();
            $table->string('spouse')->nullable();
            $table->date('spouse_dob')->nullable();
            $table->integer('number_child')->nullable();

            $table->integer('em_name')->nullable();
            $table->integer('em_phone')->nullable();
            $table->integer('em_rleation')->nullable();

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
        Schema::dropIfExists('info_personals');
    }
};
