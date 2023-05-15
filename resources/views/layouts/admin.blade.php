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
    </head>
    <body class="font-sans antialiased">
        {{-- <div class="main"></div> --}}
        <div style="background-color: #eaeef6;" class="min-h-screen">
            @include('layouts.adnavigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<!-- leaflet -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="/lib/leaflet.browser.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script src="/lib/leaflet-search-master/dist/leaflet-search.src.js"></script>
<script src="/lib/L.Control.SlideMenu.js"></script>
<script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
<script src="/lib/leaflet-geojson-vt.js"></script>
<script src="https://unpkg.com/rbush@3.0.1/rbush.js"></script>
<script src="/lib/leaflet-markers-canvas.js"></script>
<script src="/lib/Map.SelectArea.min.js"></script>
<!-- lib js -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="/lib/multiselect-dropdown.js"></script>
<!-- DataJS -->
<script src="/data/countrylayer.js"></script>
<script src="/data/districtlayer.js"></script>
<script src="/data/stateandregionlayer.js"></script>
<script src="/data/townshiplayer.js"></script>
<script src="/data/factory.js"></script>

<script>
    // Default map include
    var map = L.map('map',{
        preferCanvas: true,
        selectArea: true
    }).setView([16.8409, 96.1735], 11);

    // Tile Layers
    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        subdomains:['mt0','mt1','mt2','mt3']
    });
    var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        subdomains:['mt0','mt1','mt2','mt3']
    });
    var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        subdomains:['mt0','mt1','mt2','mt3']
    });
    var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        subdomains:['mt0','mt1','mt2','mt3']
    });
    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    // icons
    var agricultureIcon = L.icon({
        iconUrl: "img/icons/agriculture-icon.png",
        iconSize: [50,50],
    })
    var miningIcon = L.icon({
        iconUrl: "img/icons/mining-icon.png",
        iconSize: [50,50],
    })
    var industryIcon = L.icon({
        iconUrl: "img/icons/icon1.png",
        iconSize: [50,50],
    })

    //marker example
    // var junctionSquare = L.marker([16.8171,96.1307], {icon: junctionSquareIcon ,draggable: false});

    //geojson
    var country = L.geoJSON(countrylayer, {
        style:{
            color:"#19fadc",
            fillColor: "#19fadc",
        }
    }).bindTooltip('<b>Myanmar</b>');

    var district = L.geoJSON(districtlayer, {
        filter: function (feature){
            return feature.properties.ST === "Yangon";
        },
        onEachFeature:function(feature,layer){
            layer.bindPopup("<b>"+feature.properties.DT+"</b>")
            $('#sel3').append(`<option value='${feature.properties.DT}'>${feature.properties.DT}</option>`);
        },
        style:{
            stroke: true,
            color:"#de0218",
            fillColor: "#de0218",
        }
    });

    var stateandregion = L.geoJSON(stateandregionlayer,{
        filter: function (feature){
            return feature.properties.ST === "Yangon";
        },
        onEachFeature:function(feature,layer){
            layer.bindPopup("<b>"+feature.properties.ST+"</b>");
        },
        style:{
            stroke: true,
            color: "#9906d4",
            fillColor: "#9906d4",
        }
    });

    var township = L.geoJSON(townshiplayer, {
        filter: function(feature){
            return feature.properties.ST === "Yangon";
        },
        onEachFeature:function(feature,layer){
            layer.feature = feature;
            layer.bindPopup("<b>"+feature.properties.TS+"</b>");
            layer.bindTooltip("<b>"+feature.properties.TS+"</b>");
        },
        style:{
            color:"#02de15",
            fillColor: "#02de15",
            stroke: true,
        }
    });

    $("#sel3").change(function(){
        dt = [];
        $.each($("#sel3 option:selected"), function(){
            dt.push($(this).val());
        });
        $('#sel4 option').remove();
        township.eachLayer(function(layer){
            if(dt.includes(layer.feature.properties.DT))
            {
                $('#sel4').append(`<option value='${layer.feature.properties.TS}'>${layer.feature.properties.TS}</option>`);
            }
        });
        sel4.loadOptions();
    });

    let _id = 0;
    var factoryGroup = L.geoJSON(factoryjson, {
        pointToLayer: function(feature, latlng){
            let icon;
            if(feature.properties.sector === "Manufacturing"){
                icon = industryIcon;
            }else if (feature.properties.sector === "Distribution"){
                icon = agricultureIcon;
            }else if (feature.properties.sector === "Primary"){
                icon = miningIcon;
            }
            return L.marker(latlng, {icon: icon});
        },
        onEachFeature: function(feature, layer) {
            feature.properties.id = _id++;
            $('#sel2').append(`<option value='${feature.properties.sector}'>${feature.properties.sector}</option>`);
            const {lat,lng} = layer.getLatLng();
            layer.bindPopup(`
            <div class="containerstyle">
                <strong class="header">${feature.properties.name}</strong>
                <img class="image" src="${feature.properties.image}"/>
                <table class="tb">
                    <tr>
                        <td class="text">Sector </td>
                        <td>| ${feature.properties.sector}</td>
                    </tr>
                    <tr>
                        <td class="text">Area </td>
                        <td>| ${feature.properties.area}</td>
                    </tr>
                </table>
                <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded detail">View More</button>
            </div>`)
            layer.bindTooltip(feature.properties.name,{
                permanent: true,
                direction: 'top',
                offset: L.point(0,-25),
                style:{
                    color:"#19fadc",
                    fillColor: "#19fadc",
                    background: "transparent",
                    fillOpacity: 0.1
                }
            }).addTo(map);
            feature.properties.searchFactories = feature.properties.name + ', ' + feature.properties.sector+ ', ' + feature.properties.type+ ', ' + feature.properties.area;
        }
    });


    //layerGroup
    // var allFactories = L.featureGroup([industries, agriculture, mining]);

    factoryGroup
            .on('click', L.DomEvent.stopPropagation)
            .on('popupopen', function(e){
            $('.detail').on('click', function(){
                slideMenu.setContents(`
                    <img class="image2" src="${e.layer.feature.properties.image}">
                    <div class="container content">
                        <h3 class="uppercase font-arial mb-2 mt-2 font-semibold text-blue-600 text-xl">${e.layer.feature.properties.name}</h3>
                        <p1 class= "font-arial mb-1 font-semibold text-gray-900 text-sm">${e.layer.feature.properties.sector} Sector</p1>
                        <p2 class= "font-arial font-semibold text-gray-900 text-sm">${e.layer.feature.properties.type} Investment</p2>
                        <table class="table-auto border-separate [border-spacing:0.75rem] borderless">
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                </td>
                                <td class="font-arial font-medium text-gray-900 text-sm">| ${e.layer.feature.properties.phone}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </td>
                                <td class="font-arial font-medium text-gray-900 text-sm">| ${e.layer.feature.properties.email}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-map" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                    </svg>
                                </td>
                                <td class="font-arial font-medium text-gray-900 text-sm">| ${e.layer.feature.properties.address}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-building" viewBox="0 0 16 16">
                                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                                    </svg>
                                </td>
                                <td class="font-arial font-medium text-gray-900 text-sm">| ${e.layer.feature.properties.area}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                                    </svg>
                                <td class="font-arial font-medium text-gray-900 text-sm">| ${e.layer._latlng.lat}, ${e.layer._latlng.lng}</td>
                            </tr>
                        </table>
                    </div>`)
                console.log('got clicked');
                slideMenu.show();
            });
        });

    //layerController
    var layers = {
        "OSM" : osm,
        "Streets" : googleStreets,
        "Hybrid" : googleHybrid,
        "Satellite" : googleSat,
        "Terrain" : googleTerrain,
    }
    var markerGroup = {
        // "All Factories" : factoryGroup,
    }
    var layerControl = L.control.layers(layers, markerGroup,{sortLayers:false}).addTo(map);

    //Scale
    var scale = L.control.scale().addTo(map);

    //Events
    var coordinate = document.getElementsByClassName('coordinate');
    map.on('mousemove', function(e){
        coordinate[0].innerHTML ='<strong class="font-arial text-red-600">' + 'Lattitude: ' + e.latlng.lat + ', ' +  'Longitude: ' + e.latlng.lng + '</strong>';
    });

    function Country(){
        country.addTo(map);
        map.removeLayer(district);
        map.removeLayer(township);
        map.removeLayer(stateandregion);
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    function District(){
        district.addTo(map);
        map.removeLayer(country);
        map.removeLayer(township);
        map.removeLayer(stateandregion);
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    function State(){
        stateandregion.addTo(map);
        map.removeLayer(district);
        map.removeLayer(township);
        map.removeLayer(country);
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    function Township(){
        township.addTo(map);
        map.removeLayer(district);
        map.removeLayer(country);
        map.removeLayer(stateandregion);
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    function Clear(){
        map.removeLayer(township);
        map.removeLayer(district);
        map.removeLayer(country);
        map.removeLayer(stateandregion);
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    function Reset(){
        map.setView([16.8409, 96.1735], 11);
        myClick.remove();
        delete myClick;
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    var mapID = document.getElementById('map');
    function ScreenSize(){
        mapID.requestFullscreen();
        event.stopPropagation();
        map.doubleClickZoom.disable();
    }

    var myClick;
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey) {
            map.off('click');
        }
    });

    document.addEventListener('keyup', function(event) {
        if (event.ctrlKey == false) {
            addClickEventHandler();
        }
    });

    function addClickEventHandler(){
        map.on('click', function(e){
            myClick && map.removeLayer(myClick);
            myClick = L.marker([e.latlng.lat, e.latlng.lng], {draggable:true});
            myClick.bindPopup('<strong>Location: </strong>' + myClick.getLatLng()).addTo(map);
        });
    }
    addClickEventHandler();

    var filterMarkers;
    map.on('areaselected', (e) => {
        console.log(e); // lon, lat, lon, lat

        // Get the bounds of the selected area
        var bounds = e.bounds;

        // Filter the markers in each layer and add them to an array
        filteredMarkers = [];
        factoryGroup.eachLayer((layer) => {
            if (bounds.contains(layer.getLatLng())) {
                filteredMarkers.push(layer);
            }
        });

        // Do something with the filtered markers
        if (filteredMarkers.length>0) {
            backEventHandler();
            slideMenu.show();
        }
    });

    function backEventHandler(){
            var specificMarker =``;
            for (let i = 0; i < filteredMarkers.length; i++) {
                specificMarker += `
                <div>
                    <div style="flex-direction: row; display:flex; align-items:center; margin:10px; background-color:white;">
                        <button value="${filteredMarkers[i].feature.properties.id}" type="button" class="w-full font-arial bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mx-2 rounded specificDetail">${filteredMarkers[i].feature.properties.name}, ${filteredMarkers[i].feature.properties.sector}, ${filteredMarkers[i].feature.properties.type}</button>
                    </div>
                </div>`
            }
            slideMenu.setContents(`<div style="margin: 20px;">
                <h2 class="font-arial text-gray-900 text-xl font-medium">Selected Areas List</h2>
            </div>`
            + specificMarker
            );
        }

    $(document).on('click', '.specificDetail', function() {
            var clickedId = $(this).val();
            var matchedMarker = filteredMarkers.find(function(marker) {
                return marker.feature.properties.id == clickedId;
            });
            slideMenu.setContents(`
            <img class="image2" src="${matchedMarker.feature.properties.image}">
                    <div class="container content">
                        <h3 class="uppercase font-arial mb-2 mt-2 font-semibold text-blue-600 text-xl">${matchedMarker.feature.properties.name}</h3>
                        <p1 class= "font-arial mb-1 font-semibold text-gray-900 text-sm">${matchedMarker.feature.properties.sector} Sector</p1>
                        <p2 class= "font-arial font-semibold text-gray-900 text-sm">${matchedMarker.feature.properties.type} Investment</p2>
                        <table class="table-auto border-separate [border-spacing:0.75rem] borderless">
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                </td>
                                <td class="text1">| ${matchedMarker.feature.properties.phone}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </td>
                                <td class="text1">| ${matchedMarker.feature.properties.email}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-map" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                    </svg>
                                </td>
                                <td class="text1">| ${matchedMarker.feature.properties.address}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-building" viewBox="0 0 16 16">
                                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                                    </svg>
                                </td>
                                <td class="text1">| ${matchedMarker.feature.properties.area}</td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                                    </svg>
                                <td class="text1">| ${matchedMarker._latlng.lat}, ${matchedMarker._latlng.lng}</td>
                            </tr>
                        </table>
                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mx-2 rounded back">Back</button>
                    </div>
            `);
        });

        $(document).on('click', '.back',function(){
            console.log('this button is clicked');
            backEventHandler();
        });

    //Print
    L.control.browserPrint().addTo(map);

    //currentUser
    L.control.locate().addTo(map);

    //attribute
    map.attributionControl.setPrefix(false);

    //Search
    map.addControl(new L.Control.Search({
        layer: factoryGroup,
        zoom: '15',
        propertyName: 'searchFactories',
        hideMarkerOnCollapse: true,
        initial: false,
    }));

    //Side Menu
    var slideMenu = L.control.slideMenu('',{
        width: '450px',
    }).addTo(map);

    // multiselect
    $('.multisearch').on('click',function(){
        event.stopPropagation();
        map.doubleClickZoom.disable();
    });

    $(".searchBtn").click(function(){
        data = [];
        $.each($(".multiSelect option:selected"), function(){
            data.push($(this).val());
        });
        console.log('search array',data);
        if(data.length === 0)
            {
               alert('You need to choose at least 1 data to filter.');
               return;
            }
            console.log('this is all factories',factoryGroup);
        factoryGroup.eachLayer(function(layer){
                if(data.includes(layer.feature.properties.type) || data.includes(layer.feature.properties.TS) || data.includes(layer.feature.properties.DT) || data.includes(layer.feature.properties.sector))
                {
                    layer.addTo(map);
                }
                else
                {
                    layer.remove();
                }
        });
    });
    $(".remove").click(function(){
        $(".multisearch").fadeOut(500);
    });
    $(".navbtn").click(function(){
        event.stopPropagation();
        map.doubleClickZoom.disable();
        $(".multisearch").fadeIn(500);
        $(".multisearch").removeClass('d-none');
    });

    function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("my-table");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        td3 = tr[i].getElementsByTagName("td")[2];
        td4 = tr[i].getElementsByTagName("td")[3];
        td5 = tr[i].getElementsByTagName("td")[4];

        if (td1) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            txtValue4 = td4.textContent || td4.innerText;
            txtValue5 = td5.textContent || td5.innerText;
            if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function searchTable1() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("my-table1");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        td3 = tr[i].getElementsByTagName("td")[2];
        td4 = tr[i].getElementsByTagName("td")[3];
        td5 = tr[i].getElementsByTagName("td")[4];

        if (td1) {
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            txtValue4 = td4.textContent || td4.innerText;
            txtValue5 = td5.textContent || td5.innerText;
            if (txtValue2.toUpperCase().indexOf(filter) > -1 ||
                txtValue3.toUpperCase().indexOf(filter) > -1 ||
                txtValue4.toUpperCase().indexOf(filter) > -1 ||
                txtValue5.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
     //pagination
    $(document).on('click','.pagination a', function(e){
      e.preventDefault();
      let page = $(this).attr('href').split('page=')[1]
      record(page)
    })

    function record(page){
        $.ajax({
            url: "{{ route('userdata.index') }}?page=" + page,
            success:function(res){
                $('.table-data').html(res);
            }
        })
    }

</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    //pagination
   $(document).on('click','.paginate1 a', function(e){
     e.preventDefault();
     let pg = $(this).attr('href').split('page=')[1]
     record1(pg)
   })

   function record1(pg){
       $.ajax({
           url: "/users-paginate?page=" + pg,
           success:function(result){
               $('.table-data1').html(result);
           }
       })
   }

</script>

