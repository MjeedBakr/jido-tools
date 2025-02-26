<?php

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/s/{shortCode}', function ($shortCode) {
    $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();
    $shortUrl->increment('clicks');
    return redirect($shortUrl->original_url);
});
