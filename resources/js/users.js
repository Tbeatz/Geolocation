$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.paginate1 a', function(e){
    e.preventDefault();
    let pg = $(this).attr('href').split('page=')[1]
    record1(pg)
});

function record1(pg){
    $.ajax({
        url: "/users-paginate?page=" + pg,
        success:function(result){
            $('.table-data1').html(result);
        }
    })
}

$(document).on('click','#usersSearch', function(){
    var input, filter, table, tr, i;
    input = document.getElementById("searchInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("my-table1");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        var td1 = tr[i].getElementsByTagName("td")[0];
        var td2 = tr[i].getElementsByTagName("td")[1];
        var td3 = tr[i].getElementsByTagName("td")[2];
        var td4 = tr[i].getElementsByTagName("td")[3];
        var td5 = tr[i].getElementsByTagName("td")[4];

        if (td1) {
            var txtValue2 = td2.textContent || td2.innerText;
            var txtValue3 = td3.textContent || td3.innerText;
            var txtValue4 = td4.textContent || td4.innerText;
            var txtValue5 = td5.textContent || td5.innerText;
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
})
