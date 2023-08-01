<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoseMember extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'batch',
        'image',
        'date',
        'location',
        'description',
    ];
}
