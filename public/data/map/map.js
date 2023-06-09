// Default map include
var map = L.map('map', {
    preferCanvas: true,
    selectArea: true
}).setView([16.8409, 96.1735], 11);

// Tile Layers
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
}).addTo(map);

// icons
var agricultureIcon = L.icon({
    iconUrl: "img/icons/agriculture-icon.png",
    iconSize: [50, 50],
})
var miningIcon = L.icon({
    iconUrl: "img/icons/mining-icon.png",
    iconSize: [50, 50],
})
var industryIcon = L.icon({
    iconUrl: "img/icons/icon1.png",
    iconSize: [50, 50],
})
//marker example
// var junctionSquare = L.marker([16.8171,96.1307], {icon: junctionSquareIcon ,draggable: false});

//geojson
var factoryGroup = L.geoJSON({
    "type": "FeatureCollection",
    "features": []
}, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: feature.properties.icon
        });
    },
    onEachFeature: function (feature, layer) {
        // console.log(feature);
        const { lat, lng } = layer.getLatLng();
        layer.bindPopup(`
        <div class="containerstyle">
            <strong class="header">${feature.properties.company_name}</strong>
            <img class="image" src="${feature.properties.image}"/>
            <table class="tb">
                <tr>
                    <td class="text">Sector </td>
                    <td>| ${feature.properties.sector}</td>
                </tr>
                <tr>
                    <td class="text">Area </td>
                    <td>| ${feature.properties.land_area}</td>
                </tr>
            </table>
            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded detail">View More</button>
        </div>`)
        layer.bindTooltip(feature.properties.company_name, {
            permanent: true,
            direction: 'top',
            offset: L.point(0, -15),
            style: {
                color: "#19fadc",
                fillColor: "#19fadc",
                background: "transparent",
                fillOpacity: 0.1
            }
        });
        feature.properties.searchFactories = feature.properties.name + ', ' + feature.properties.sector + ', ' + feature.properties.type + ', ' + feature.properties.company_reg_no;
    }
});
map.addLayer(factoryGroup);
// map.on('zoomend', function () { //this is for the error of markercluster library and search library
//     var currentZoom = map.getZoom();

//     if (currentZoom >= 13) {
//     }
// });

//layerGroup
// var allFactories = L.featureGroup([industries, agriculture, mining]);

factoryGroup
    .on('click', L.DomEvent.stopPropagation)
    .on('popupopen', function (e) {
        $('.detail').on('click', function () {
            slideMenu.setContents(`
                <img class="w-full h-auto" src="${e.layer.feature.properties.image}">
                <div class="container content">
                    <h3 class="uppercase font-arial mb-2 mt-2 font-semibold text-blue-600 text-lg">${e.layer.feature.properties.company_name}</h3>
                    <p1 class= "font-arial mb-1 font-semibold text-gray-900 text-sm">${e.layer.feature.properties.sector} Sector</p1>
                    <p2 class= "font-arial font-semibold text-gray-900 text-sm">${e.layer.feature.properties.type} Investment</p2>
                    <table class="table-auto border-separate border-collapse mt-3">
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${e.layer.feature.properties.investor_phone}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${e.layer.feature.properties.investor_email}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-map" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${e.layer.feature.properties.zone}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-building" viewBox="0 0 16 16">
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${e.layer.feature.properties.land_type}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-geo" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${e.layer._latlng.lat}, ${e.layer._latlng.lng}</td>
                        </tr>
                    </table>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mt-4 rounded show_all_details" value=${e.layer.feature.properties.id}>Show All Details</button>
                </div>`)
            // console.log('got clicked');
            slideMenu.show();
        });
    });

//layerController
var layers = {
    "OSM": osm,
    "Streets": googleStreets,
    "Hybrid": googleHybrid,
    "Satellite": googleSat,
    "Terrain": googleTerrain,
}
var markerGroup = {
    // "All Factories" : factoryGroup,
}
var layerControl = L.control.layers(layers, markerGroup, { sortLayers: false }).addTo(map);

//Scale
var scale = L.control.scale().addTo(map);

//Events
var coordinate = document.getElementsByClassName('coordinate');
map.on('mousemove', function (e) {
    coordinate[0].innerHTML = '<strong>' + 'Lattitude: ' + e.latlng.lat + ', ' + 'Longitude: ' + e.latlng.lng + '</strong>';
});
var country = L.geoJSON(countrylayer, {
    style: {
        color: "#19fadc",
        fillColor: "#19fadc",
    }
}).bindTooltip('<b>Myanmar</b>');

var district = L.geoJSON(districtlayer, {
    filter: function (feature) {
        return feature.properties.ST === "Yangon";
    },
    onEachFeature: function (feature, layer) {
        layer.bindPopup("<b>" + feature.properties.DT + "</b>")
    },
    style: {
        stroke: true,
        color: "#de0218",
        fillColor: "#de0218",
    }
});

var stateandregion = L.geoJSON(stateandregionlayer, {
    filter: function (feature) {
        return feature.properties.ST === "Yangon";
    },
    onEachFeature: function (feature, layer) {
        layer.bindPopup("<b>" + feature.properties.ST + "</b>");
    },
    style: {
        stroke: true,
        color: "#9906d4",
        fillColor: "#9906d4",
    }
});

var township = L.geoJSON(townshiplayer, {
    filter: function (feature) {
        return feature.properties.ST === "Yangon";
    },
    onEachFeature: function (feature, layer) {
        layer.feature = feature;
        layer.bindPopup("<b>" + feature.properties.TS + "</b>");
        layer.bindTooltip("<b>" + feature.properties.TS + "</b>");
    },
    style: {
        color: "#02de15",
        fillColor: "#02de15",
        stroke: true,
    }
});

var clustermarkers = L.markerClusterGroup({
    disableClusteringAtZoom: 13,
});

$('#Country').on('click', function (event) {
    country.addTo(map);
    map.removeLayer(district);
    map.removeLayer(township);
    map.removeLayer(stateandregion);
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$('#District').on('click', function (event) {
    district.addTo(map);
    map.removeLayer(country);
    map.removeLayer(township);
    map.removeLayer(stateandregion);
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$('#State').on('click', function (event) {
    stateandregion.addTo(map);
    map.removeLayer(district);
    map.removeLayer(township);
    map.removeLayer(country);
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$('#Township').on('click', function (event) {
    township.addTo(map);
    map.removeLayer(district);
    map.removeLayer(country);
    map.removeLayer(stateandregion);
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$('#Clear').on('click', function (event) {
    map.removeLayer(township);
    map.removeLayer(district);
    map.removeLayer(country);
    map.removeLayer(stateandregion);
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$('#Reset').on('click', function (event) {
    map.setView([16.8409, 96.1735], 11);
    geoajax();
    if (!myClick) {
        event.stopPropagation();
        map.doubleClickZoom.disable();
        return;
    }
    myClick.remove();
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

var mapID = document.getElementById('map');
$('#ScreenSize').on('click', function (event) {
    mapID.requestFullscreen();
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

var myClick;
map.on('click', function (e) {
    if (e.originalEvent.ctrlKey) {
        return;
    }
    myClick && map.removeLayer(myClick);
    myClick = L.marker([e.latlng.lat, e.latlng.lng], { draggable: true });
    myClick.bindPopup('<strong>Location: </strong>' + myClick.getLatLng()).addTo(map);
});

var filteredMarkers;
map.on('areaselected', (e) => {
    // console.log(e); // lon, lat, lon, lat

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
    if (filteredMarkers.length > 0) {
        backEventHandler();
        slideMenu.show();
    }
});

function backEventHandler() {
    var specificMarker = ``;
    for (let i = 0; i < filteredMarkers.length; i++) {
        specificMarker += `
            <div>
                <div style="flex-direction: row; display:flex; align-items:center; margin:10px; background-color:white;">
                    <button value="${filteredMarkers[i].feature.properties.id}" type="button" class="w-full font-arial bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mx-2 rounded specificDetail">${filteredMarkers[i].feature.properties.company_name}, ${filteredMarkers[i].feature.properties.sector}, ${filteredMarkers[i].feature.properties.type}</button>
                </div>
            </div>`
    }
    slideMenu.setContents(`<div style="margin: 20px;">
            <h2 class="font-arial text-gray-900 text-xl font-medium">Selected Areas List</h2>
        </div>`
        + specificMarker
    );
}

$(document).on('click', '.specificDetail', function () {
    var clickedId = $(this).val();
    var matchedMarker = filteredMarkers.find(function (marker) {
        return marker.feature.properties.id == clickedId;
    });
    slideMenu.setContents(`
        <img class="w-full h-auto" src="${matchedMarker.feature.properties.image}">
                <div class="container content">
                    <h3 class="uppercase font-arial mb-2 mt-2 font-semibold text-blue-600 text-xl">${matchedMarker.feature.properties.company_name}</h3>
                    <p1 class= "font-arial mb-1 font-semibold text-gray-900 text-sm">${matchedMarker.feature.properties.sector} Sector</p1>
                    <p2 class= "font-arial font-semibold text-gray-900 text-sm">${matchedMarker.feature.properties.type} Investment</p2>
                    <table class="table-auto border-separate border-collapse mt-3">
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${matchedMarker.feature.properties.investor_phone}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${matchedMarker.feature.properties.investor_email}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-map" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${matchedMarker.feature.properties.zone}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-building" viewBox="0 0 16 16">
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${matchedMarker.feature.properties.land_type}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border-r-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1a73e8" class="bi bi-geo" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                                </svg>
                            </td>
                            <td class="font-arial font-medium text-gray-900 text-sm px-4 py-2">${matchedMarker._latlng.lat}, ${matchedMarker._latlng.lng}</td>
                        </tr>
                    </table>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mt-4 rounded show_all_details" value=${matchedMarker.feature.properties.id}>Show All Details</button>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mt-1 rounded back">Back</button>
                </div>
        `);
});

$(document).on('click', '.back', function () {
    // console.log('this button is clicked');
    backEventHandler();
});

//Print
L.control.browserPrint().addTo(map);

//currentUser
L.control.locate().addTo(map);

//attribute
map.attributionControl.setPrefix(false);

//Search
// Custom Search control
var CustomSearchControl = L.Control.Search.extend({
    onAdd: function (map) {
        // Create the search control but don't add the layer initially
        var searchControl = L.Control.Search.prototype.onAdd.call(this, map);
        // Remove the layer from the map
        if (clustermarkers.getLayers().length !== 1) {
            map.removeLayer(this.options.layer);
        }

        return searchControl;
    }
});

// Create the custom search control instance
var customSearchControl = new CustomSearchControl({
    layer: factoryGroup,
    zoom: '15',
    propertyName: 'searchFactories',
    hideMarkerOnCollapse: true,
    initial: false,
});

// Add the custom search control to the map
map.addControl(customSearchControl);

//Side Menu
var slideMenu = L.control.slideMenu('', {
    width: '450px',
}).addTo(map);

// multiselect
$('.multisearch').on('click', function (event) {
    event.stopPropagation();
    map.doubleClickZoom.disable();
});

$(".searchBtn").click(function () {
    var fformOfInvest = $('#sel1').val()
    var fsector = $('#sel2').val()
    var fdistrict = $('#sel3').val()
    var ftownship = $('#sel4').val()
    var data = [];
    $.each($(".multiSelect option:selected"), function () {
        data.push($(this).val());
    });
    console.log('search array', data);
    if (data.length === 0) {
        alert('You need to choose at least 1 data to filter.');
        return;
    }
    $.ajax({
        url: '/filter',
        method: 'GET',
        data: {"formOfInvest":fformOfInvest, "sector":fsector, "district":fdistrict, "township":ftownship},
        success: function (res) {
            // Process the data
            const features = res.map(function (profile) {
                var coordinates = JSON.parse(profile.geolocation);
                var sectorName = profile.sector.name;
                var type;
                if (profile.type == 0) {
                    type = 'Local';
                } else {
                    type = 'Foreign';
                }
                var sectorIcon = L.icon({
                    iconSize: [50, 50],
                    iconUrl: '/storage/' + profile.sector.icon,
                    iconAnchor: [25, 25],
                });
                return {
                    "type": "Feature",
                    "properties": {
                        "id": profile.id,
                        "company_name": profile.company_name,
                        "company_reg_no": profile.company_reg_no,
                        'company_reg_date': profile.company_reg_date,
                        'commercial_date': profile.commercial_date,
                        'permit_no': profile.permit_no,
                        'permit_date': profile.permit_date,
                        'permit_type': profile.permit_type.name,
                        'formOfInvest': profile.form_of_invest_id,
                        'form_of_invest': profile.form_of_invest.name,
                        'investor_name': profile.investor_name,
                        'investor_phone': profile.investor_phone,
                        'investor_email': profile.investor_email,
                        "businesstype": profile.businesstype_detail,
                        "sector": sectorName,
                        "icon": sectorIcon,
                        'country': profile.country.name,
                        'region': profile.region.name,
                        'district': profile.districts.name,
                        'township': profile.townships.name,
                        "TS": profile.townships.id,
                        "DT": profile.districts.id,
                        "RG": profile.region_id,
                        "zone": profile.businesszone.name,
                        'land_area': profile.land_area,
                        'land_plot_no': profile.land_plot_no,
                        'land_measure_no': profile.land_measure_no,
                        'street_no': profile.street_no,
                        'street_name': profile.street_name,
                        'land_type': profile.landtype.name,
                        "type": type,
                        'local_labour_male': profile.local_labour_male,
                        'local_labour_female': profile.local_labour_female,
                        'foreign_director_male': profile.foreign_director_male,
                        'foreign_director_female': profile.foreign_director_female,
                        'foreign_technician_male': profile.foreign_technician_male,
                        'foreign_technician_female': profile.foreign_technician_female,
                        'foreign_dependent_male': profile.foreign_dependent_male,
                        'foreign_dependent_female': profile.foreign_dependent_female,
                        "image": '/storage/' + profile.cover,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": coordinates
                    }
                };
            });
            const geojson =  {
                "type": "FeatureCollection",
                features
            }
            factoryGroup.clearLayers();
            clustermarkers.clearLayers();
            factoryGroup.addData(geojson);
            clustermarkers.addLayer(factoryGroup);
            map.addLayer(clustermarkers);
        }
    })
});
$(".remove").click(function () {
    $(".multisearch").fadeOut(500);
});
$(".navbtn").click(function (event) {
    event.stopPropagation();
    map.doubleClickZoom.disable();
    $(".multisearch").fadeIn(500);
    $(".multisearch").removeClass('d-none');
});
function main(geofactoryjson) {
    factoryGroup.clearLayers();
    clustermarkers.clearLayers();
    factoryGroup.addData(geofactoryjson);
    clustermarkers.addLayer(factoryGroup);
    // if (clustermarkers.getLayers().length !== 1) {
    map.addLayer(clustermarkers);
    // }
}
geoajax();

//ajax for district and townships
$('#sel3').change(function () {
    var dt = $(this).val();
    if (dt.length > 0) {
        $.ajax({
            url: "/tsp",
            type: "GET",
            data: {"district":dt},
            success: function (data) {
                $('#sel4').empty();
                $.each(data, function (index, value) {
                    var option = `<option value="${value.id}"}>${value.name}</option>`
                    $('#sel4').append(option);
                    sel4.loadOptions();
                });
            }
        });
    } else {
        $('#sel4').empty();
        sel4.loadOptions();
    }
});

//detail modal for factories
$(document).on('click', '.show_all_details', function(e) {
    e.stopPropagation();
    const detail_factoryid = $(this).val();
    let detail_factory;
    factoryGroup.eachLayer(function(layer) {
        if (layer.feature.properties.id == detail_factoryid) {
            detail_factory = layer;
        }
    });
    if (detail_factory) {
        map.doubleClickZoom.disable();
        $('#map-modal').on('click',function(e){
            e.stopPropagation();
        })
        //open modal
        $('#map-modal').show();
        //close modal
        $('#map_close, #map-close-btn').on('click', function(e){
            e.stopPropagation();
            $('#map-modal').hide();
        });
        $('#company_header').html(detail_factory.feature.properties.company_name + "'s Information")
        $('#map_company_name').val(detail_factory.feature.properties.company_name);
        $('#map_company_reg_no').val(detail_factory.feature.properties.company_reg_no);
        $('#map_company_reg_date').val(detail_factory.feature.properties.company_reg_date);
        $('#map_permit_no').val(detail_factory.feature.properties.permit_no);
        $('#map_permit_date').val(detail_factory.feature.properties.permit_date);
        $('#map_permit_type').val(detail_factory.feature.properties.permit_type);
        $('#map_form_of_invest').val(detail_factory.feature.properties.form_of_invest);
        $('#map_investor_name').val(detail_factory.feature.properties.investor_name);
        $('#map_investor_phone').val(detail_factory.feature.properties.investor_phone);
        $('#map_investor_email').val(detail_factory.feature.properties.investor_email);
        $('#map_businesstype').val(detail_factory.feature.properties.businesstype);
        $('#map_sector').val(detail_factory.feature.properties.sector);
        $('#map_region').val(detail_factory.feature.properties.region);
        $('#map_district').val(detail_factory.feature.properties.district);
        $('#map_township').val(detail_factory.feature.properties.township);
        $('#map_zone').val(detail_factory.feature.properties.zone);
        $('#map_land_area').val(detail_factory.feature.properties.land_area);
        $('#map_land_type').val(detail_factory.feature.properties.land_type);

    }
});
