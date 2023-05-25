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
            $('#sector_message').html(`
            <div class="flex p-4 text-green-800 rounded-lg bg-green-50 dark:bg-green-50 dark:text-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    ${response.message}
                </div>
            </div>
            `);
            $('#icon_input').val('');
            $('#sector_error').html('');
            $('.sector_icon').prop('src', '/storage/'+response.sector.icon);
            $('.sector_previewicon').prop('src', '');
            $('.sector_previewicon').addClass('opacity-0');
            sectionRender();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 422) {
                var errorResponse = JSON.parse(jqXHR.responseText);
                $('#sector_message').html('');
                $('#sector_error').html(`
                    <div class="flex p-4 text-red-800 rounded-lg bg-red-50 dark:bg-red-50 dark:text-red-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-arial">
                            ${errorResponse.message}
                        </div>
                    </div>
                `);
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
    $('#sector_message, #sector_error').html('');
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
$(document).on('click','#sectorSearch', function(e){
    e.preventDefault();
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
