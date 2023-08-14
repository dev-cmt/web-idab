<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReasons extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'status',
    ];
}
