<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EventRegister extends Model
{
    use HasFactory;
    protected $fillable=[
        'self',
        'guest',
        'driver',
        'spouse',
        'child_above',
        'child_bellow',
        'total_person',
        'total_amount',
        'event_id',
        'payment_details_id',
        'member_id',
    ];
       
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
