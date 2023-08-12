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
        Schema::create('info_others', function (Blueprint $table) {
            $table->id();
            $table->text('about_me')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('cover_photo')->nullable();
            $table->string('favorite')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->string('whatsapp_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('snapchat_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('wechat_url')->nullable();
            $table->string('discord_url')->nullable();
            
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
        Schema::dropIfExists('info_others');
    }
};
