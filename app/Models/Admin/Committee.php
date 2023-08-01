<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Committee extends Model
{
    use HasFactory;

    protected $fillable = [
        'cm_advisor',
        'cm_ecommittee',
        'cm_welfare',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
