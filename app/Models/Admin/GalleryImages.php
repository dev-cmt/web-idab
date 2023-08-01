<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Gallery;

class GalleryImages extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'gallery_id',
    ];
    public function posts(){
        return $this->belongsTo(Gallery::class);
    }
}
