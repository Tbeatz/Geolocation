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
                        "id": profile.id,
                        "company_name": profile.company_name,
                        "company_reg_no": profile.company_reg_no,
                        'company_reg_date': profile.company_reg_date,
                        'commercial_date': profile.commercial_date,
                        'permit_no': profile.permit_no,
                        'permit_date': profile.permit_date,
                        'permit_type': profile.permit_type.name,
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
            main(geojson);
            console.log(geojson)
        }
    });
}


