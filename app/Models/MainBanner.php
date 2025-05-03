<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBanner extends Model
{
    use HasFactory;
    
    protected $fillable = ['media_path', 'media_type', 'flag'];

    /**
     * Ensure only one banner is active.
     */
    public static function setActiveBanner($bannerId)
    {
        // Deactivate all other banners
        self::where('flag', true)->update(['flag' => false]);

        // Activate the selected banner
        self::where('id', $bannerId)->update(['flag' => true]);
    }
}
