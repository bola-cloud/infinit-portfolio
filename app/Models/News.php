<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_subtitle',
        'en_subtitle',
        'ar_head',
        'en_head',
        'ar_content',
        'en_content',
        'image1_path',
        'image2_path',
        'flag',
    ];
}
