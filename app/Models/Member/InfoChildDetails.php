<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoChildDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'child_name',
        'child_dob',
        'child_gender',
        'status',
        'member_id',
    ];
}
