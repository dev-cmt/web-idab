<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoFamily extends Model
{
    use HasFactory;
    protected $fillable=[
        'child_name',
        'child_dob',
        'child_gender',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
