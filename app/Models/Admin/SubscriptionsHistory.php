<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SubscriptionsHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_month',
        'pay_date',
        'amount',
        'status',
        'subscriptions_id',
    ];
}
