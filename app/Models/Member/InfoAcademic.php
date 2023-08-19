<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\MastQualification;
use App\Models\User;

class InfoAcademic extends Model
{
    use HasFactory;
    protected $fillable=[
        'institute',
        'mast_qualification_id',
        'subject',
        'passing_year',
        'other_qualification',
        'status',
        'member_id',
    ];

    public function mastQualification()
    {
        return $this->belongsTo(MastQualification::class);
    }
}
