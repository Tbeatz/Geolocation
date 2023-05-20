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
// sector modal
let modal = document.getElementById("my-modal");

let btn = document.getElementById("open-btn");

let button = document.getElementById("close-btn");
let button1 = document.getElementById('close-btn1');
btn.onclick = function() {
    modal.style.display = "block";
}
button.onclick = function() {
    modal.style.display = "none";
}
button1.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
