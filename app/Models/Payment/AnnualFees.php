<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualFees extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_date',
        'due_date',
        'fine',
        'due_amount',
        'paid_amount',
        'fee_plan_id',
        'payment_details_id',
        'member_id',
    ];
}
