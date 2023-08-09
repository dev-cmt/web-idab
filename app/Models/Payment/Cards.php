<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number',
        'card_holder_name',
        'expiration_date',
        'user_id',
    ];
}
