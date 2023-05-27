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
        <style>
            @keyframes gradientAnimation {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            .animate-gradient {
                animation: gradientAnimation 4s linear infinite;
                background: linear-gradient(to right, #3911a5, #109452);
                background-size: 200% auto;
            }

            @keyframes borderAnimation {
                0% {
                    border-color: #c13bf6;
                }
                50% {
                    border-color: #0b2ef5;
                }
                100% {
                    border-color: #10b981;
                }
            }

            .animated-border {
                animation: borderAnimation 5s infinite;
                border-style: solid;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
