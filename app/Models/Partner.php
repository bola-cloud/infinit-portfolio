<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(PartnerCategory::class, 'category_id', 'id');
    }
}
