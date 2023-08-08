<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCompany extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_name',
        'company_email',
        'company_phone',
        'designation',
        'address',
        'web_url',
        'is_job',
        'is_business',
        'status',
        'member_id',
    ];
}
