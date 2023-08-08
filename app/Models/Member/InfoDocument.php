<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoDocument extends Model
{
    use HasFactory;
    protected $fillable=[
        'trade_licence',
        'tin_certificate',
        'nid_photo_copy',
        'passport_photo',
        'edu_certificate',
        'experience_certificate',
        'stu_id_copy',
        'recoment_letter',
        'status',
        'member_id',
    ];
}
