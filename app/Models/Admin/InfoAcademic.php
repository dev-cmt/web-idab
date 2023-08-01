<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InfoAcademic extends Model
{
    use HasFactory;
    protected $fillable=[
        'collage',
        'subject',
        'degree',
        'passing_year',

        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
