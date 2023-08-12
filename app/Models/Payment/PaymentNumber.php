<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'for_reasons',
        'payment_method_id',
        'member_id',
        'status',
    ];
}
