<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'amount',
        'transaction_type',
        'transaction_id',
        'status',
        'payment_method_id',
        'user_id',
    ];

}
