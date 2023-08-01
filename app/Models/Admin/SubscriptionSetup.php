<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSetup extends Model
{
    use HasFactory;
    protected $fillable = [
        'monthly_fee',
        'sub_start_date',
    ];
}
