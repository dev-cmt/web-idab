<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\PaymentReasons;
use App\Models\User;

class PaymentNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'payment_reason_id',
        'ref_reason_id',
        'payment_method_id',
        'member_id',
        'user_id',
        'status',
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentReason()
    {
        return $this->belongsTo(PaymentReasons::class, 'payment_reason_id');
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id');
    }
}
