// Create the factoryjson object
function geoajax() {
    $.ajax({
        url: '/map',
        type: 'GET',
        success: function (res) {
            // Process the data
           const features = res.map(function (profile) {
                console.log(profile.geolocation);
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
                        "name": profile.company_name,
                        "sector": sectorName,
                        "icon": sectorIcon,
                        "businesstype": profile.businesstype_detail,
                        "contact": profile.contact_information,
                        "type": type,
                        "image": '/storage/' + profile.cover,
                        "company_reg_no": profile.company_reg_no,

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
            main(geojson);
            console.log(geojson)
        }
    });
}


