<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoPersonal extends Model
{
    use HasFactory;
    protected $fillable=[
        'dob',
        'gender',
        'address',
        'city',
        'marrital_status',
        'spouse',
        'birth_day',
        'number_child',
        
        'em_name',
        'em_phone',
        'em_rleation',

        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
