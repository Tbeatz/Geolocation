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
                background: radial-gradient(rgb(78, 45, 37),rgb(33, 0, 95)) !important;
                -webkit-overflow-Y: hidden;
                -moz-overflow-Y: hidden;
                -o-overflow-Y: hidden;
                overflow-y: hidden;
                -webkit-animation: fadeIn 1 1s ease-out;
                -moz-animation: fadeIn 1 1s ease-out;
                -o-animation: fadeIn 1 1s ease-out;
                animation: fadeIn 1 1s ease-out;
            }

            .light {
                position: absolute;
                width: 0px;
                opacity: .75;
                background-color: white;
                box-shadow: #82249e 0px 0px 20px 2px;
                opacity: 0;
                top: 100vh;
                bottom: 0px;
                left: 0px;
                right: 0px;
                margin: auto;
            }

            .x1{
              -webkit-animation: floatUp 4s infinite linear;
              -moz-animation: floatUp 4s infinite linear;
              -o-animation: floatUp 4s infinite linear;
              animation: floatUp 4s infinite linear;
               -webkit-transform: scale(1.0);
               -moz-transform: scale(1.0);
               -o-transform: scale(1.0);
              transform: scale(1.0);
            }

            .x2{
              -webkit-animation: floatUp 7s infinite linear;
              -moz-animation: floatUp 7s infinite linear;
              -o-animation: floatUp 7s infinite linear;
              animation: floatUp 7s infinite linear;
              -webkit-transform: scale(1.6);
              -moz-transform: scale(1.6);
              -o-transform: scale(1.6);
              transform: scale(1.6);
              left: 15%;
            }

            .x3{
              -webkit-animation: floatUp 2.5s infinite linear;
              -moz-animation: floatUp 2.5s infinite linear;
              -o-animation: floatUp 2.5s infinite linear;
              animation: floatUp 2.5s infinite linear;
              -webkit-transform: scale(.5);
              -moz-transform: scale(.5);
              -o-transform: scale(.5);
              transform: scale(.5);
              left: -15%;
            }

            .x4{
              -webkit-animation: floatUp 4.5s infinite linear;
              -moz-animation: floatUp 4.5s infinite linear;
              -o-animation: floatUp 4.5s infinite linear;
              animation: floatUp 4.5s infinite linear;
              -webkit-transform: scale(1.2);
              -moz-transform: scale(1.2);
              -o-transform: scale(1.2);
              transform: scale(1.2);
              left: -34%;
            }

            .x5{
              -webkit-animation: floatUp 8s infinite linear;
              -moz-animation: floatUp 8s infinite linear;
              -o-animation: floatUp 8s infinite linear;
              animation: floatUp 8s infinite linear;
              -webkit-transform: scale(2.2);
              -moz-transform: scale(2.2);
              -o-transform: scale(2.2);
              transform: scale(2.2);
              left: -57%;
            }

            .x6{
              -webkit-animation: floatUp 3s infinite linear;
              -moz-animation: floatUp 3s infinite linear;
              -o-animation: floatUp 3s infinite linear;
              animation: floatUp 3s infinite linear;
              -webkit-transform: scale(.8);
              -moz-transform: scale(.8);
              -o-transform: scale(.8);
              transform: scale(.8);
              left: -81%;
            }

            .x7{
              -webkit-animation: floatUp 5.3s infinite linear;
              -moz-animation: floatUp 5.3s infinite linear;
              -o-animation: floatUp 5.3s infinite linear;
              animation: floatUp 5.3s infinite linear;
              -webkit-transform: scale(3.2);
              -moz-transform: scale(3.2);
              -o-transform: scale(3.2);
              transform: scale(3.2);
              left: 37%;
            }

            .x8{
              -webkit-animation: floatUp 4.7s infinite linear;
              -moz-animation: floatUp 4.7s infinite linear;
              -o-animation: floatUp 4.7s infinite linear;
              animation: floatUp 4.7s infinite linear;
              -webkit-transform: scale(1.7);
              -moz-transform: scale(1.7);
              -o-transform: scale(1.7);
              transform: scale(1.7);
              left: 62%;
            }

            .x9{
              -webkit-animation: floatUp 4.1s infinite linear;
              -moz-animation: floatUp 4.1s infinite linear;
              -o-animation: floatUp 4.1s infinite linear;
              animation: floatUp 4.1s infinite linear;
              -webkit-transform: scale(0.9);
              -moz-transform: scale(0.9);
              -o-transform: scale(0.9);
              transform: scale(0.9);
              left: 85%;
            }
            @-webkit-keyframes floatUp{
              0%{top: 100vh; opacity: 0;}
              25%{opacity: 1;}
              50%{top: 0vh; opacity: .8;}
              75%{opacity: 1;}
              100%{top: -100vh; opacity: 0;}
            }
            @-moz-keyframes floatUp{
              0%{top: 100vh; opacity: 0;}
              25%{opacity: 1;}
              50%{top: 0vh; opacity: .8;}
              75%{opacity: 1;}
              100%{top: -100vh; opacity: 0;}
            }
            @-o-keyframes floatUp{
              0%{top: 100vh; opacity: 0;}
              25%{opacity: 1;}
              50%{top: 0vh; opacity: .8;}
              75%{opacity: 1;}
              100%{top: -100vh; opacity: 0;}
            }
            @keyframes floatUp{
              0%{top: 100vh; opacity: 0;}
              25%{opacity: 1;}
              50%{top: 0vh; opacity: .8;}
              75%{opacity: 1;}
              100%{top: -100vh; opacity: 0;}
            }

            @-webkit-keyframes fadeIn{
              from{opacity: 0;}
              to{opacity: 1;}
            }

            @-moz-keyframes fadeIn{
              from{opacity: 0;}
              to{opacity: 1;}
            }

            @-o-keyframes fadeIn{
              from{opacity: 0;}
              to{opacity: 1;}
            }

            @keyframes fadeIn{
              from{opacity: 0;}
              to{opacity: 1;}
            }

            @-webkit-keyframes fadeOut{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 0;}
            }

            @-moz-keyframes fadeOut{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 0;}
            }

            @-o-keyframes fadeOut{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 0;}
            }

            @keyframes fadeOut{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 0;}
            }

            @-webkit-keyframes finalFade{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 1;}
            }

            @-moz-keyframes finalFade{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 1;}
            }

            @-o-keyframes finalFade{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 1;}
            }

            @keyframes finalFade{
              0%{opacity: 0;}
              30%{opacity: 1;}
              80%{opacity: .9;}
              100%{opacity: 1;}
            }
            </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            <div>
                <a href="/">
                    <x-welcome-style class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="mt-6">
                <div class='light x1'></div>
                <div class='light x2'></div>
                <div class='light x3'></div>
                <div class='light x4'></div>
                <div class='light x5'></div>
                <div class='light x6'></div>
                <div class='light x7'></div>
                <div class='light x8'></div>
                <div class='light x9'></div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
