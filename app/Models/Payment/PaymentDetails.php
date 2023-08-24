<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\PaymentMethods;
use App\Models\Admin\Event;
use App\Models\Payment\EventRegister;
use App\Models\User;

class PaymentDetails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_date',
        'paid_amount',
        'payment_number',
        'transaction_number',
        'transaction_id',
        'payment_reason_id',
        'ref_reason_id',
        'transfer_number',
        'message',
        'slip',
        'payment_method_id',
        'status',
        'member_id',
        'user_id',
    ];
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id');
    }
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'ref_reason_id');
    }
    public function eventRegister()
    {
        return $this->hasOne(EventRegister::class, 'payment_details_id');
    }
    public function approveBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
