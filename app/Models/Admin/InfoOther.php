<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoOther extends Model
{
    use HasFactory;
    protected $fillable=[
        'about_me',
        'nick_name',
        'phone_number',
        'designation',
        'company_name',
        
        'cover_photo',
        'favorite',
        
        'facebook_url',
        'youtube_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',

        'whatsapp_url',
        'telegram_url',
        'snapchat_url',
        'tiktok_url',
        'wechat_url',
        'discord_url',

        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
