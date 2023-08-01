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

use App\Models\Admin\InfoFamily;
use App\Models\Admin\InfoAcademic;
use App\Models\Admin\InfoPersonal;
use App\Models\Admin\InfoOther;
use App\Models\Admin\Committee;
use App\Models\Admin\EventPayment;
use App\Models\Admin\EventRegister;
use App\Models\Admin\Gallery;

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
        'batch',
        'contact_number',
        'email',
        'password',
        'status',
        'profile_photo_path',
        'is_admin',

        'cm_adviser',
        'cm_ecommittee',
        'cm_welfare',
        'pune_member',
    ];

    public function infoPersonal()
    {
        return $this->hasOne(InfoPersonal::class);
    }
    public function infoFamily()
    {
        return $this->hasMany(InfoFamily::class);
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