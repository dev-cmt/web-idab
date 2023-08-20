<?php

namespace App\Models\Member;

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

        'status',
        'member_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
