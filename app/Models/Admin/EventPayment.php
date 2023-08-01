<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Event;
use App\Models\User;

class EventPayment extends Model
{
    use HasFactory;
    protected $fillable=[
        'payment_type',
        'pay_number',
        'status',
        'user_id',
        'event_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
