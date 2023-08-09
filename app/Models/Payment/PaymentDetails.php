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
        'for_reasons',
        'transfer_number',
        'message',
        'payment_method_id',
        'user_id',
    ];
}
