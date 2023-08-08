<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoPersonal extends Model
{
    use HasFactory;
    protected $fillable=[
        'contact_number',
        'nid_no',
        'dob',
        'father_name',
        'mother_name',
        'present_address',
        'parmanent_address',
        'gender',
        'blood_group',
        'marrital_status',
        'spouse',
        'spouse_dob',
        'number_child',
        'em_name',
        'em_phone',
        'em_rleation',
        'status',
        'member_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }
}
