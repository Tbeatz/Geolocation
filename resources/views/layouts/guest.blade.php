<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Geolocation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                margin: 0;
                height: 100vh;
                font-weight: 100;
                background: #eaeef6;
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            <div class="p-4 sm:p-10 bg-green-600 shadow sm:rounded-lg border-2 border-green-200">
                <div>
                    <a href="/">
                        <x-welcome-style/>
                    </a>
                </div>
                <div class="mt-2">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
