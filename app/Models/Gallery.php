<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['ar_title', 'en_title', 'type','featured_image_id'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function featuredImage()
    {
        return $this->belongsTo(GalleryImage::class, 'featured_image_id');
    }
}
