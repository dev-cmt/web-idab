<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoFamily;
use App\Models\Member\InfoOther;
use App\Models\Master\MemberType;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'member_type_id',
        'status',
        'is_admin',
        'is_approve',
    ];

    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }
    public function infoPersonal()
    {
        return $this->hasOne(InfoPersonal::class, 'member_id');
    }
    public function parentUser()
    {
        return $this->belongsTo(User::class, 'is_approve');
    }






    public function infoAcademic()
    {
        return $this->hasOne(InfoAcademic::class);
    }
    public function infoOther()
    {
        return $this->hasOne(InfoOther::class);
    }
    public function eventPayment()
    {
        return $this->hasMany(EventPayment::class);
    }
    public function eventRegister()
    {
        return $this->hasMany(EventRegister::class);
    }
    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}


?>