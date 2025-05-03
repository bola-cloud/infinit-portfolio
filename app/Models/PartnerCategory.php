<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_name',
        'en_name',
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'category_id');
    }
}
