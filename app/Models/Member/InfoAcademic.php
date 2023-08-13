<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoAcademic extends Model
{
    use HasFactory;
    protected $fillable=[
        'institute',
        'mast_qualification_id',
        'subject',
        'passing_year',
        'other_qualification',
        'status',
        'member_id',
    ];
}
