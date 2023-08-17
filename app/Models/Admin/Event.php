<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\EventPayment;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'image',
        'caption',
        'event_date',
        'self',
        'spouse',
        'child_above',
        'child_bellow',
        'guest',
        'driver',
        'description',
        'location',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function eventPayment()
    {
        return $this->hasOne(EventPayment::class);
    }
}
