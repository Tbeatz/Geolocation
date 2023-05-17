// Retrieve the JSON-encoded data from the hidden element
var profilesData = JSON.parse(document.getElementById('geoprofile').textContent);

// Create the factoryjson object
var geofactoryjson = {
    "type": "FeatureCollection",
    "features": []
};

// Process the data
profilesData.forEach(function(profile) {
    var coordinates = JSON.parse(profile.geolocation);
    var sectorName = profile.sector.name;
    var type;
    if (profile.type == 0) {
        type = 'Local';
    }else{
        type = 'Foreign';
    }
    var sectorIcon = L.icon({
        iconSize: [50, 50],
        iconUrl: '/storage/'+profile.sector.icon,
    });
    var feature = {
        "type": "Feature",
        "properties": {
            "name": profile.company_name,
            "sector": sectorName,
            "icon" : sectorIcon,
            "businesstype": profile.businesstype_detail,
            "contact": profile.contact_information,
            "type" : type,
            "image" : '/storage/'+profile.cover,
            "company_reg_no": profile.company_reg_no,

        },
        "geometry": {
            "type": "Point",
            "coordinates": coordinates
        }
    };
    geofactoryjson.features.push(feature);
});
