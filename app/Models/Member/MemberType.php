<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id',
    ];
    
}
