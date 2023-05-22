// pagination
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.sectorpaginate a', function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    record(page)
});

function record(page){
    $.ajax({
        url: "/sectors?page=" + page,
        success:function(res){
            $('.sector-table-data').html(res);
        }
    })
}

//ajax edit
$(document).on('click','.open-btn', function(){
    var sector_id = $(this).val();
    $.ajax({
        method: 'GET',
        url: '/sectors/' + sector_id,
        success:function(res){ //res is the return value from controller
            $('.sector_name').html(res.name);
            $('.sector_icon').prop('src', '/storage/'+res.icon);
            $('#sectoricon_save').val(res.id);
            $('#my-modal').show();
        }
    })
});
$('#sectoricon_save').on('click', function(){
    var sector_id = $(this).val();
    var form = document.getElementById('sector_form_id');
    var formData = new FormData(form);
    $.ajax({
        method: 'POST',
        url: '/sectors/'+ sector_id,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $('#sector_message').html(response.message);
            $('.sector_icon').prop('src', '/storage/'+response.sector.icon);
            $('.sector_previewicon').prop('src', '');
            $('.sector_previewicon').addClass('opacity-0');
            sectionRender();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 422) {
                var errorResponse = JSON.parse(jqXHR.responseText);
                $('#sector_message').html(errorResponse.message);
            }
            else {
                console.log('Error occurred:', textStatus, errorThrown);
            }
        }
    });
});
function sectionRender(){
    $.ajax({
        method: 'GET',
        url: '/fetch-sectors',
        success: function(res){
            // console.log(res);
            var tbody = document.querySelector('#sector-table tbody'); //$('#sector-table tbody');
            var row = '';
            res.forEach(function(rowData, index) {
                // console.log(rowData);
                row += `<tr class="bg-white border-b h-12 dark:bg-white dark:border-gray-200 hover:bg-green-50 dark:hover:bg-gray-100 dark:text-gray-900">
                <td>${index+1}</td>
                <td class="flex justify-center items-center py-3">
                    <img class="w-16 h-16 rounded-full ring-1 ring-gray-200 dark:ring-gray-200" src="${'/storage/'+rowData.icon}" alt="">
                </td>
                <td>${rowData.name}</td>
                <td>
                    <div class="inline-flex">
                        <button value="${rowData.id}" class="open-btn font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Edit
                        </button>
                    </div>
                </td></tr>`;
            });
            tbody.innerHTML= row;
            //tbody.apppend(row);
        }
    });
};
$('#close-btn, #close-btn1').on('click', function(){
    $('#my-modal').hide();
    $('.sector_form')[0].reset();
    $('.sector_previewicon').prop('src', '');
    $('.sector_previewicon').addClass('opacity-0');
    $('#sector_message').html('');
});

//image preview
$('#icon_input').on('change', function(e){
    var file = e.target.files[0];
    var preview = $('.sector_previewicon');
    var url = URL.createObjectURL(file);
    preview.removeClass('opacity-0');
    preview.prop('src', url);
});
// searchbox
$(document).on('click','#sectorSearch', function(){
    var input, filter, table, tr, i;
    input = document.getElementById("sectorInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("sector-table");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        var td1 = tr[i].getElementsByTagName("td")[0];
        var td2 = tr[i].getElementsByTagName("td")[1];
        var td3 = tr[i].getElementsByTagName("td")[2];
        if (td1) {
            var txtValue2 = td2.textContent || td2.innerText;
            var txtValue3 = td3.textContent || td3.innerText;
            if (txtValue3.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
});
