<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoStudent extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_institute',
        'semester',
        'head_faculty_name',
        'head_faculty_number',
        'status',
        'member_id',
    ];
}
