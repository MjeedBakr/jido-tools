<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'short_code',
        'clicks',
    ];

    /**
     * Generate a unique short code
     */
    public static function generateUniqueShortCode($length = 6)
    {
        do {
            $shortCode = Str::random($length);
        } while (static::where('short_code', $shortCode)->exists());

        return $shortCode;
    }

    /**
     * Get the full short URL
     */
    public function getShortUrlAttribute()
    {
        return url('/' . $this->short_code);
    }

    /**
     * Increment the click count
     */
    public function incrementClicks()
    {
        $this->increment('clicks');
    }
}