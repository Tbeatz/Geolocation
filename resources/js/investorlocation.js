//image preview
$('#cover').on('change', function(e){
    var file = e.target.files[0];
    var preview = $('.preview_cover');
    var url = URL.createObjectURL(file);
    preview.removeClass('opacity-0');
    preview.prop('src', url);
});
$(document).ready(function() {
    $('#invloc-close').click(function() {
    $('#invloc-msg').slideUp(400);
    });
});
