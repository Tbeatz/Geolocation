//image preview
$(document).ready(function () {
    $('#cover').on('change', function (e) {
        var file = e.target.files[0];
        var preview = $('.preview_cover');
        var url = URL.createObjectURL(file);
        preview.removeClass('opacity-0');
        preview.prop('src', url);
    });
    $(document).ready(function () {
        $('#invloc-close').click(function () {
            $('#invloc-msg').slideUp(400);
        });
    });

    //ajax for district and townships
    var profiles = JSON.parse(document.getElementById('investor_profile').textContent);
    $('#region_id').change(function () {
        console.log(profiles.district_id);
        var regionId = $(this).val();
        if (regionId) {
            $.ajax({
                url: "/district/" + regionId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">Select a District</option>');
                    $.each(data, function (key, value) {
                        var option = `<option value="${value.id}" ${profiles.district_id == value.id ? 'selected ' : ''}>${value.name}</option>`
                        $('#district_id').append(option);
                        console.log(option);
                    });
                    $('#district_id').change();
                }
            });
        } else {
            $('#township_id').empty();
            $('#township_id').append('<option value="">Select a Township</option>');
            $('#district_id').empty();
            $('#district_id').append('<option value="">Select a District</option>');
        }
    }).change();

    $('#district_id').change(function() {
        var districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: "/township/" + districtId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#township_id').empty();
                    $('#township_id').append('<option value="">Select a Township</option>');
                    $.each(data, function (key, value) {
                        var option = `<option value="${value.id}" ${profiles.township_id == value.id ? 'selected' : ''}>${value.name}</option>`
                        $('#township_id').append(option);
                    });
                }
            });
        } else {
            $('#township_id').empty();
            $('#township_id').append('<option value="">Select a Township</option>');
        }
    });
});
