<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryImages;
use App\Models\User;
class Gallery extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'date',
        'cover',
        'drive_url',
        'public',
        'status',
        'user_id',
    ];

    public function images(){
        return $this->hasMany(GalleryImages::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}