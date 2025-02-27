<?php

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Route;

Route::get('/url-shortener', function () {
    return view('url-shortener.home');
})->name('url-shortener');

Route::get('/{shortCode}', function ($shortCode) {
    $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();
    $shortUrl->increment('clicks');
    return redirect($shortUrl->original_url);
});
