<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOME</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="px-5 py-3">
        <div class="flex flex-col">
            <div class='flex justify-between items-center p-4 rounded-xl bg-red-600'>
                @if (Route::has('login'))
                    <livewire:welcome.navigation/>
                @endif
                <x-application-logo/>
            </div>
            <div class="flex flex-col items-center mt-10 space-y-5 text-xl font-bold font-mono">
                <img src="https://ouch-cdn2.icons8.com/WB0j20utz0l3cdTY68vXSfsZf3mli9aiL3nQOm4YXq0/rs:fit:425:456/extend:false/wm:1:re:0:0:0.8/wmid:ouch/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvNzAy/LzNjYzQ0MGU1LWVm/MDUtNDRhNi1hYWE2/LTFmYTU4ZDNlYTIx/YS5zdmc.png" class="h-36 w-36">
                
                <p>The best solution to keep track of how your day is going</p>

                @auth
                    <a href="/dashboard" class="bg-red-600 text-white font-extrabold px-5 py-3 rounded-xl">GET STARTED</a>
                @endauth
                @guest
                    <a href="/login" class="bg-red-600 text-white font-extrabold px-5 py-3 rounded-xl">GET STARTED</a>                    
                @endguest
            </div>
        </div>
    </body>
</html>
