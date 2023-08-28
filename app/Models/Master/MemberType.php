<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MemberType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prefix',
        'registration_fee',
        'monthly_fee',
        'annual_fee',
        'description',
        'status',
        'user_id',
        'is_delete',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
