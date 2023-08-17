<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subscription extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_type',
        'payment_number',
        'transaction_no',
        'fees',
        'start_date',
        'end_date',
        'duo_amount',
        'fineds',
        'receive_by',
        'description',
        'status',
        'user_id',
        
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
