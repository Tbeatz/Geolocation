$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    record(page)
});

function record(page){
    $.ajax({
        url: "/userdata?page=" + page,
        success:function(res){
            $('.table-data').html(res);
        }
    })
}

$(document).on('click', '#userDataSearch', function(){
    var input, filter, table, tr, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("my-table");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        var td1 = tr[i].getElementsByTagName("td")[0];
        var td2 = tr[i].getElementsByTagName("td")[1];
        var td3 = tr[i].getElementsByTagName("td")[2];
        var td4 = tr[i].getElementsByTagName("td")[3];
        var td5 = tr[i].getElementsByTagName("td")[4];

        if (td1) {
            var txtValue1 = td1.textContent || td1.innerText;
            var txtValue2 = td2.textContent || td2.innerText;
            var txtValue3 = td3.textContent || td3.innerText;
            var txtValue4 = td4.textContent || td4.innerText;
            var txtValue5 = td5.textContent || td5.innerText;
            if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
});

$('#userdata-close').click(function(){
    $('#userdata-msg').slideUp(400);
});

$('#userdatadel-close').click(function(){
    $('#userdatadel-msg').slideUp(400);
});
