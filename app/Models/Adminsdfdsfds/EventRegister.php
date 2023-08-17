<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EventRegister extends Model
{
    use HasFactory;
    protected $fillable=[
        'person_no',
        'payment_number',
        'total_amount',
        'transaction_no',
        'status',
        'receive_by',
        'payment_type',
        'event_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
