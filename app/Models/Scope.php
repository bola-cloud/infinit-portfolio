<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;
    protected $fillable = ['ar_title', 'en_title', 'ar_description', 'en_description', 'icon', 'color'];

    // Relationship with Project
    public function projects()
    {
        return $this->hasMany(Project::class, 'scope_id');
    }
    // Function to get the correct title based on app locale
    public function getTitleAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->ar_title : $this->en_title;
    }

    // Function to get the correct description based on app locale
    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->ar_description : $this->en_description;
    }
}
