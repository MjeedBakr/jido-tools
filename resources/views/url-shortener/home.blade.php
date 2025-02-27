<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-gray-100 min-h-screen" dir="rtl">
        <header class="bg-blue-600 shadow-md">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-3xl font-bold text-white">مختصر الروابط</h1>
            </div>
        </header>
    
        <main class="container mx-auto px-4 py-8">            
            <livewire:url-shortener />
        </main>


        @livewireScripts
    </body>
</html>
