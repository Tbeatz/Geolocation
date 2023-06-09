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
        <!-- leaflet css -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
        <link rel="stylesheet" href="/lib/leaflet-search-master/dist/leaflet-search.src.css"/>
        <link rel="stylesheet" href="/lib/L.Control.SlideMenu.css">
        <link rel="stylesheet" href="/lib/Leaflet.markercluster-1.4.1/dist/MarkerCluster.css"/>
        <link rel="stylesheet" href="/lib/Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css"/>
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom css -->
        <link rel="stylesheet" href="/css/geolocation.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .main {
                position: fixed;
                top: 50%;
                left: 50%;
                height: 1px;
                width: 1px;
                background-color: #fff;
                border-radius: 50%;
                box-shadow: -42vw -4vh 0px 0px #fff,25vw -41vh 0px 0px #fff,-20vw 49vh 0px 1px #fff,5vw 40vh 1px 1px #fff,29vw 19vh 1px 0px #fff,-44vw -13vh 0px 0px #fff,46vw 41vh 0px 1px #fff,-3vw -45vh 0px 1px #fff,47vw 35vh 1px 0px #fff,12vw -8vh 1px 0px #fff,-34vw 48vh 1px 1px #fff,32vw 26vh 1px 1px #fff,32vw -41vh 1px 1px #fff,0vw 37vh 1px 1px #fff,34vw -26vh 1px 0px #fff,-14vw -49vh 1px 0px #fff,-12vw 45vh 0px 1px #fff,-44vw -33vh 0px 1px #fff,-13vw 41vh 0px 0px #fff,-36vw -11vh 0px 1px #fff,-23vw -24vh 1px 0px #fff,-38vw -27vh 0px 1px #fff,16vw -19vh 0px 0px #fff,28vw 33vh 1px 0px #fff,-49vw -4vh 0px 0px #fff,16vw 32vh 0px 1px #fff,36vw -18vh 1px 0px #fff,-25vw -30vh 1px 0px #fff,-23vw 24vh 0px 1px #fff,-2vw -35vh 1px 1px #fff,-25vw 9vh 0px 0px #fff,-15vw -34vh 0px 0px #fff,-8vw -19vh 1px 0px #fff,-20vw -20vh 1px 1px #fff,42vw 50vh 0px 1px #fff,-32vw 10vh 1px 0px #fff,-23vw -17vh 0px 0px #fff,44vw 15vh 1px 0px #fff,-40vw 33vh 1px 1px #fff,-43vw 8vh 0px 0px #fff,-48vw -15vh 1px 1px #fff,-24vw 17vh 0px 0px #fff,-31vw 50vh 1px 0px #fff,36vw -38vh 0px 1px #fff,-7vw 48vh 0px 0px #fff,15vw -32vh 0px 0px #fff,29vw -41vh 0px 0px #fff,2vw 37vh 1px 0px #fff,7vw -40vh 1px 1px #fff,15vw 18vh 0px 0px #fff,25vw -13vh 1px 1px #fff,-46vw -12vh 1px 1px #fff,-18vw 22vh 0px 0px #fff,23vw -9vh 1px 0px #fff,50vw 12vh 0px 1px #fff,45vw 2vh 0px 0px #fff,14vw -48vh 1px 0px #fff,23vw 43vh 0px 1px #fff,-40vw 16vh 1px 1px #fff,20vw -31vh 0px 1px #fff,-17vw 44vh 1px 1px #fff,18vw -45vh 0px 0px #fff,33vw -6vh 0px 0px #fff,0vw 7vh 0px 1px #fff,-10vw -18vh 0px 1px #fff,-19vw 5vh 1px 0px #fff,1vw 42vh 0px 0px #fff,22vw 48vh 0px 1px #fff,39vw -8vh 1px 1px #fff,-6vw -42vh 1px 0px #fff,-47vw 34vh 0px 0px #fff,-46vw 19vh 0px 1px #fff,-12vw -32vh 0px 0px #fff,-45vw -38vh 0px 1px #fff,-28vw 18vh 1px 0px #fff,-38vw -46vh 1px 1px #fff,49vw -6vh 1px 1px #fff,-28vw 18vh 1px 1px #fff,10vw -24vh 0px 1px #fff,-5vw -11vh 1px 1px #fff,33vw -8vh 1px 0px #fff,-16vw 17vh 0px 0px #fff,18vw 27vh 0px 1px #fff,-8vw -10vh 1px 1px #fff;

            /* stars were too big with the layers above but left the code in case no one cares  -- as in, if noone's just that  one other loner who actually cares    */

            box-shadow: 24vw 9vh 1px 0px #fff,12vw -24vh 0px 1px #fff,-45vw -22vh 0px 0px #fff,-37vw -40vh 0px 1px #fff,29vw 19vh 0px 1px #fff,4vw -8vh 0px 1px #fff,-5vw 21vh 1px 1px #fff,-27vw 26vh 1px 1px #fff,-47vw -3vh 1px 1px #fff,-28vw -30vh 0px 1px #fff,-43vw -27vh 0px 1px #fff,4vw 22vh 1px 1px #fff,36vw 23vh 0px 0px #fff,-21vw 24vh 1px 1px #fff,-16vw 2vh 1px 0px #fff,-16vw -6vh 0px 0px #fff,5vw 26vh 0px 0px #fff,-34vw 41vh 0px 0px #fff,1vw 42vh 1px 1px #fff,11vw -13vh 1px 1px #fff,48vw -8vh 1px 0px #fff,22vw -15vh 0px 0px #fff,45vw 49vh 0px 0px #fff,43vw -27vh 1px 1px #fff,20vw -2vh 0px 0px #fff,8vw 22vh 0px 1px #fff,39vw 48vh 1px 1px #fff,-21vw -11vh 0px 1px #fff,-40vw 45vh 0px 1px #fff,11vw -30vh 1px 0px #fff,26vw 30vh 1px 0px #fff,45vw -29vh 0px 1px #fff,-2vw 18vh 0px 0px #fff,-29vw -45vh 1px 0px #fff,-7vw -27vh 1px 1px #fff,42vw 24vh 0px 0px #fff,45vw -48vh 1px 0px #fff,-36vw -18vh 0px 0px #fff,-44vw 13vh 0px 1px #fff,36vw 16vh 0px 1px #fff,40vw 24vh 0px 0px #fff,18vw 11vh 0px 0px #fff,-15vw -23vh 1px 0px #fff,-24vw 48vh 0px 1px #fff,27vw -45vh 1px 0px #fff,-2vw -24vh 0px 1px #fff,-15vw -28vh 0px 0px #fff,-43vw 13vh 1px 0px #fff,7vw 27vh 1px 0px #fff,47vw 5vh 0px 0px #fff,-45vw 15vh 1px 1px #fff,-5vw -28vh 0px 1px #fff,38vw 25vh 1px 1px #fff,-39vw -1vh 1px 0px #fff,5vw 0vh 1px 0px #fff,49vw 13vh 0px 0px #fff,48vw 10vh 0px 1px #fff,19vw -28vh 0px 0px #fff,4vw 7vh 0px 0px #fff,21vw 21vh 1px 1px #fff,-15vw -15vh 0px 1px #fff,-6vw -42vh 1px 0px #fff,-15vw 48vh 1px 1px #fff,-23vw 25vh 1px 1px #fff,-48vw 25vh 0px 1px #fff,-31vw -19vh 0px 1px #fff,4vw 37vh 1px 1px #fff,-43vw 28vh 0px 0px #fff,3vw -25vh 0px 1px #fff,-39vw 14vh 0px 1px #fff,-40vw 31vh 0px 1px #fff,35vw -36vh 1px 1px #fff,16vw 49vh 0px 0px #fff,6vw 39vh 0px 0px #fff,3vw -35vh 0px 1px #fff,-44vw -2vh 1px 0px #fff,-6vw 21vh 1px 0px #fff,48vw 9vh 1px 1px #fff,-43vw 30vh 1px 1px #fff,29vw -12vh 1px 1px #fff,-48vw 13vh 1px 0px #fff,-42vw 32vh 1px 1px #fff,34vw 15vh 1px 1px #fff,29vw -37vh 1px 1px #fff,28vw 2vh 0px 0px #fff;
            animation: zoom 10s alternate infinite;
            }

            @keyframes zoom {
                0%{
                    transform: scale(1);
                }
                100%{
                    transform: scale(1.5);
                }
            }
        @keyframes lights {
            0% {
                color: hsl(230, 40%, 80%);
                text-shadow:
                0 0 1em hsla(320, 100%, 50%, 0.2),
                0 0 0.125em hsla(320, 100%, 60%, 0.3),
                -1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
                1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
            }

            30% {
                color: hsl(230, 80%, 90%);
                text-shadow:
                0 0 1em hsla(320, 100%, 50%, 0.5),
                0 0 0.125em hsla(320, 100%, 60%, 0.5),
                -0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
                0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
            }

            40% {
                color: hsl(230, 100%, 95%);
                text-shadow:
                0 0 1em hsla(320, 100%, 50%, 0.5),
                0 0 0.125em hsla(320, 100%, 90%, 0.5),
                -0.25em -0.125em 0.125em hsla(40, 100%, 60%, 0.2),
                0.25em 0.125em 0.125em hsla(200, 100%, 60%, 0.4);
            }

            70% {
                color: hsl(230, 80%, 90%);
                text-shadow:
                0 0 1em hsla(320, 100%, 50%, 0.5),
                0 0 0.125em hsla(320, 100%, 60%, 0.5),
                0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
                -0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
            }

            100% {
                color: hsl(230, 40%, 80%);
                text-shadow:
                0 0 1em hsla(320, 100%, 50%, 0.2),
                0 0 0.125em hsla(320, 100%, 60%, 0.3),
                1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
                -1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
            }

            }

        .textanime {
            margin: auto;
            font-size: 3.5rem;
            font-weight: 300;
            animation: lights 5s 750ms linear infinite;
        }
        </style>
         <!-- leaflet -->
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
        <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
        <script src="https://unpkg.com/rbush@3.0.1/rbush.js"></script>
        <!-- lib js -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="/lib/Leaflet.markercluster-1.4.1/dist/leaflet.markercluster-src.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.3/dist/echarts.min.js"></script>
        {{-- <script src="/lib/Leaflet.markercluster-1.4.1/src/MarkerCluster.js"></script> --}}
        <script src="/lib/multiselect-dropdown.js"></script>
        <script src="/lib/leaflet.browser.print.min.js"></script>
        <script src="/lib/leaflet-search-master/dist/leaflet-search.src.js"></script>
        <script src="/lib/L.Control.SlideMenu.js"></script>
        <script src="/lib/leaflet-geojson-vt.js"></script>
        <script src="/lib/leaflet-markers-canvas.js"></script>
        <script src="/lib/Map.SelectArea.min.js"></script>
        <!-- DataJS -->
        <script src="/data/countrylayer.js"></script>
        <script src="/data/districtlayer.js"></script>
        <script src="/data/stateandregionlayer.js"></script>
        <script src="/data/townshiplayer.js"></script>
        <script src="/data/factory.js"></script>
    </head>
    <body class="font-sans antialiased">
        {{-- <div class="main"></div> --}}
        <div class="min-h-screen">
            @include('layouts.adnavigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    @stack('adminmodal')
</html>
