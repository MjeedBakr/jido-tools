<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShortUrl;
use Livewire\WithPagination;

class UrlShortener extends Component
{
    use WithPagination;

    public $originalUrl = '';
    public $shortCode = '';
    
    protected $rules = [
        'originalUrl' => 'required|url',
    ];

    public function createShortUrl()
    {
        $this->validate();
        
        try {
            $shortCode = ShortUrl::generateUniqueShortCode();
            
            ShortUrl::create([
                'original_url' => $this->originalUrl,
                'short_code' => $shortCode,
                'clicks' => 0,
            ]);
            
            $this->shortCode = $shortCode;
            $this->originalUrl = '';
        } catch (\Exception $e) {
        }
    }
    
    public function getShortUrls()
    {
        return ShortUrl::orderBy('created_at', 'desc')->paginate(10);
    }
    
    public function render()
    {
        return view('livewire.url-shortener', [
            'shortUrls' => $this->getShortUrls(),
        ]);
    }
}