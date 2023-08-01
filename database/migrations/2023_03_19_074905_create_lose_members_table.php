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
        Schema::create('lose_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('batch')->nullable();
            $table->string('image')->nullable();
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('lose_members');
    }
};
