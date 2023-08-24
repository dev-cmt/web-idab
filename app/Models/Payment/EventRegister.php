<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Event;
use App\Models\Payment\PaymentDetails;

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
        'status',
    ];
       
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function paymentDetails()
    {
        return $this->belongsTo(PaymentDetails::class, 'payment_details_id');
    }
}
