<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'registration_fee',
        'monthly_fee',
        'annual_fee',
        'description',
        'status',
        'user_id',
    ];
    
}