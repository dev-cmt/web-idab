<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'payment_method_id',
        'user_id',
    ];
}
