$(document).ready(function() {
    $('#dash-close').click(function() {
        $('#dash-msg').slideUp(400);
    });

    $('#form_of_invest_id').change(function(){
        var FOI = $(this).val();
        if(FOI == 1){
            $('#local_invest').val(100);
            $('#foreign_invest').val(0);
            $('#local_invest_div, #foreign_invest_div').addClass('hidden');
        }else if(FOI == 2){
            $('#local_invest').val(0);
            $('#foreign_invest').val(100);
            $('#local_invest_div, #foreign_invest_div').addClass('hidden');
        }else if (FOI == 4){
            $('#local_invest').val('');
            $('#foreign_invest').val('');
            $('#local_invest_div, #foreign_invest_div').removeClass('hidden');
        }else{
            $('#local_invest_div, #foreign_invest_div').addClass('hidden');
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //director
    $('#director-del-close').click(function() {
        $('#director-del-msg').slideUp(400);
    });

    $(document).on('click','.director_pagination a', function(e){
        e.preventDefault();
        let directorpage = $(this).attr('href').split('page=')[1]
        director_record(directorpage)
    });

    function director_record(directorpage){
        $.ajax({
            url: "/director-paginate?page=" + directorpage,
            success:function(res){
                $('.director_table_data').html(res);
            }
        });
    }
    //Search
    $(document).on('click', '#directorSearch', function(e){
        e.preventDefault();
        var input, filter, table, tr, i;
        input = document.getElementById("directorInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("director_table");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            var td1 = tr[i].getElementsByTagName("td")[0];
            var td2 = tr[i].getElementsByTagName("td")[1];
            var td3 = tr[i].getElementsByTagName("td")[2];
            var td4 = tr[i].getElementsByTagName("td")[3];
            var td5 = tr[i].getElementsByTagName("td")[4];
            var td6 = tr[i].getElementsByTagName("td")[5];

            if (td1) {
                var txtValue1 = td1.textContent || td1.innerText;
                var txtValue2 = td2.textContent || td2.innerText;
                var txtValue3 = td3.textContent || td3.innerText;
                var txtValue4 = td4.textContent || td4.innerText;
                var txtValue5 = td5.textContent || td5.innerText;
                var txtValue6 = td6.textContent || td6.innerText;
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1 || txtValue6.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
    //modal close
    $('#director_close, #director-close-btn').on('click', function(){
        $('#director-modal').hide();
        $('.director_form')[0].reset();
        $('#director_message, #director_error').html('');
    });
    //add
    $(document).on('click', '#director_add', function(){
        $('#director_save').removeClass('hidden');
        $('#director_update').addClass('hidden');
        $('#director-modal').show();
        $('#director_save').on('click', function(){
            var form = document.getElementById('director_form_id');
            var formData = new FormData(form);
            $.ajax({
                method: 'POST',
                url: '/director-create',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#director_message').html(`
                    <div class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-arial">
                            ${response.message}
                        </div>
                    </div>
                    `);
                    $('#director_error').html('');
                    $('.director_form')[0].reset();
                    directorRender();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422) {
                        var errorResponse = JSON.parse(jqXHR.responseText);
                        $('#director_message').html('');
                        $('#director_error').html(`
                            <div class="flex p-4 rounded-lg bg-red-50 text-red-800" role="alert">
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
    });
    //edit
    $(document).on('click','.director_edit', function(){
        $('#director_update').removeClass('hidden');
        $('#director_save').addClass('hidden');
        var director_id = $(this).val();
        console.log(director_id);
        $.ajax({
            method: 'GET',
            url: '/director/' + director_id,
            success:function(res){ //res is the return value from controller
                console.log(res);
                $('#director_name').val(res.name);
                $('#director_passport_nrc').val(res.passport_nrc);
                $('#director_address').val(res.address);
                $('#director_phone').val(res.phone);
                $('#director_email').val(res.email);
                $('#director_nationality_id').val(res.nationality_id);
                $('#director_update').val(res.id);
                $('#director-modal').show();
            }
        })
    });
    $('#director_update').on('click', function(){
        var director_id = $(this).val();
        var form = document.getElementById('director_form_id');
        var formData = new FormData(form);
        $.ajax({
            method: 'POST',
            url: '/director-update/'+ director_id,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#director_message').html(`
                <div class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-arial">
                        ${response.message}
                    </div>
                </div>
                `);
                $('#director_error').html('');
                $('#director_name').val(response.name);
                $('#director_passport_nrc').val(response.passport_nrc);
                $('#director_address').val(response.address);
                $('#director_phone').val(response.phone);
                $('#director_email').val(response.email);
                $('#director_nationality_id').val(response.nationality_id);
                directorRender();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 422) {
                    var errorResponse = JSON.parse(jqXHR.responseText);
                    $('#director_message').html('');
                    $('#director_error').html(`
                        <div class="flex p-4 rounded-lg bg-red-50 text-red-800" role="alert">
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
    function directorRender(){
        $.ajax({
            method: 'GET',
            url: '/fetch-directors',
            success: function(res){
                $('.director_table_data').html(res);
            }
        });
    };
    //delete
    $(document).on('click', '#director_delete', function(e){
        const d_id = $(this).val();
        e.preventDefault()
        $('#reject_modal').show();
        $('#yes1_btn').click(function(){
            $.ajax({
                method: 'DELETE',
                url: '/director-delete/'+ d_id,
                success:function(res){
                    $('#director-del-msg').show();
                    $('.director_del_alert').html(res.message);
                    $('#reject_modal').hide();
                    directorRender();
                }
            });
        });

        $('#no1_btn, #no1_icon').click(function(){
            $('#reject_modal').hide();
        });
    });

    //shareholder
    $('#shareholder-del-close').click(function() {
        $('#shareholder-del-msg').slideUp(400);
    });

    $(document).on('click','.shareholder_pagination a', function(e){
        e.preventDefault();
        let shareholderpage = $(this).attr('href').split('page=')[1]
        shareholder_record(shareholderpage)
    });

    function shareholder_record(shareholderpage){
        $.ajax({
            url: "/shareholder-paginate?page=" + shareholderpage,
            success:function(res){
                $('.shareholder_table_data').html(res);
            }
        })
    }
    $(document).on('click', '#shareholderSearch', function(e){
        e.preventDefault();
        var shareholder_input, shareholder_filter, shareholder_table, shareholder_tr, shareholder_i;
        shareholder_input = document.getElementById("shareholderInput");
        shareholder_filter = shareholder_input.value.toUpperCase();
        shareholder_table = document.getElementById("shareholder_table");
        shareholder_tr = shareholder_table.getElementsByTagName("tr");
        for (shareholder_i = 1; shareholder_i < shareholder_tr.length; shareholder_i++) {
            var shareholder_td1 = shareholder_tr[shareholder_i].getElementsByTagName("td")[0];
            var shareholder_td2 = shareholder_tr[shareholder_i].getElementsByTagName("td")[1];
            var shareholder_td3 = shareholder_tr[shareholder_i].getElementsByTagName("td")[2];
            var shareholder_td4 = shareholder_tr[shareholder_i].getElementsByTagName("td")[3];
            var shareholder_td5 = shareholder_tr[shareholder_i].getElementsByTagName("td")[4];

            if (shareholder_td1) {
                var shareholder_txtValue1 = shareholder_td1.textContent || shareholder_td1.innerText;
                var shareholder_txtValue2 = shareholder_td2.textContent || shareholder_td2.innerText;
                var shareholder_txtValue3 = shareholder_td3.textContent || shareholder_td3.innerText;
                var shareholder_txtValue4 = shareholder_td4.textContent || shareholder_td4.innerText;
                var shareholder_txtValue5 = shareholder_td5.textContent || shareholder_td5.innerText;
                if (shareholder_txtValue1.toUpperCase().indexOf(shareholder_filter) > -1 || shareholder_txtValue2.toUpperCase().indexOf(shareholder_filter) > -1 || shareholder_txtValue3.toUpperCase().indexOf(shareholder_filter) > -1 || shareholder_txtValue4.toUpperCase().indexOf(shareholder_filter) > -1 || shareholder_txtValue5.toUpperCase().indexOf(shareholder_filter) > -1) {
                    shareholder_tr[shareholder_i].style.display = "";
                } else {
                    shareholder_tr[shareholder_i].style.display = "none";
                }
            }
        }
    });
    //modal close
    $('#shareholder_close, #shareholder-close-btn').on('click', function(){
        $('#shareholder-modal').hide();
        $('.shareholder_form')[0].reset();
        $('#shareholder_message, #shareholder_error').html('');
    });
    //add
    $(document).on('click', '#shareholder_add', function(){
        $('#shareholder_save').removeClass('hidden');
        $('#shareholder_update').addClass('hidden');
        $('#shareholder-modal').show();
        $('#shareholder_save').on('click', function(){
            var form = document.getElementById('shareholder_form_id');
            var formData = new FormData(form);
            $.ajax({
                method: 'POST',
                url: '/shareholder-create',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#shareholder_message').html(`
                    <div class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-arial">
                            ${response.message}
                        </div>
                    </div>
                    `);
                    $('#shareholder_error').html('');
                    $('.shareholder_form')[0].reset();
                    shareholderRender();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422) {
                        var errorResponse = JSON.parse(jqXHR.responseText);
                        $('#shareholder_message').html('');
                        $('#shareholder_error').html(`
                            <div class="flex p-4 rounded-lg bg-red-50 text-red-800" role="alert">
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
    });
     //edit
    $(document).on('click','.shareholder_edit', function(){
        $('#shareholder_update').removeClass('hidden');
        $('#shareholder_save').addClass('hidden');
        var shareholder_id = $(this).val();
        console.log(shareholder_id);
        $.ajax({
            method: 'GET',
            url: '/shareholder/' + shareholder_id,
            success:function(res){ //res is the return value from controller
                console.log(res);
                $('#shareholder_name').val(res.name);
                $('#shareholder_designation').val(res.designation);
                $('#shareholder_passport_nrc').val(res.passport_nrc);
                $('#shareholder_address').val(res.address);
                $('#shareholder_phone').val(res.phone);
                $('#shareholder_email').val(res.email);
                $('#shareholder_nationality_id').val(res.nationality_id);
                $('#shareholder_update').val(res.id);
                $('#shareholder-modal').show();
            }
        })
    });
    $('#shareholder_update').on('click', function(){
        var shareholder_id = $(this).val();
        var form = document.getElementById('shareholder_form_id');
        var formData = new FormData(form);
        $.ajax({
            method: 'POST',
            url: '/shareholder-update/'+ shareholder_id,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#shareholder_message').html(`
                <div class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-arial">
                        ${response.message}
                    </div>
                </div>
                `);
                $('#shareholder_error').html('');
                $('#shareholder_name').val(response.name);
                $('#shareholder_designation').val(response.designation);
                $('#shareholder_passport_nrc').val(response.passport_nrc);
                $('#shareholder_address').val(response.address);
                $('#shareholder_phone').val(response.phone);
                $('#shareholder_email').val(response.email);
                $('#shareholder_nationality_id').val(response.nationality_id);
                shareholderRender();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 422) {
                    var errorResponse = JSON.parse(jqXHR.responseText);
                    $('#director_message').html('');
                    $('#director_error').html(`
                        <div class="flex p-4 rounded-lg bg-red-50 text-red-800" role="alert">
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

    //delete
    $(document).on('click', '#shareholder_delete', function(e){
        const s_id = $(this).val();
        console.log(s_id);
        e.preventDefault()
        $('#reject_modal').show();
        $('#yes1_btn').click(function(){
            $.ajax({
                method: 'DELETE',
                url: '/shareholder-delete/'+ s_id,
                success:function(res){
                    $('#reject_modal').hide();
                    $('#shareholder-del-msg').show();
                    $('.shareholder_del_alert').html(res.message);
                    shareholderRender();
                }
            })
            
        });
        
        $('#no1_btn, #no1_icon').click(function(){
            $('#reject_modal').hide();
        });
    });
    
    function shareholderRender(){
        $.ajax({
            method: 'GET',
            url: '/fetch-shareholders',
            success: function(res){
                $('.shareholder_table_data').html(res);
            }
        });
    };
});
