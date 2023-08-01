<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'email',
        'image',
        'subject',
        'description',
        'check',
        'seen',
        'to_id',
        'user_id',
    ];
}