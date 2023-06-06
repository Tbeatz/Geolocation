$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#detail-close').click(function() {
        $('#detail-msg').slideUp(400);
    });

    $('#environment_plan').change(function(){
        var environment_plan_value = $(this).val();
        if(environment_plan_value == 1){
            $('.enplan_date').removeClass('hidden');
            $('#environment_plan_date').prop('required', true);
        }else{
            $('#environment_plan_date').prop('required', false);
            $('#environment_plan_date').val('');
            $('.enplan_date').addClass('hidden');
        }
    }).change();

    $('#industry_reg').change(function(){
        var industry_reg_value = $(this).val();
        if(industry_reg_value == 1){
            $('.ind_reg_no, .ind_reg_date').removeClass('hidden');
            $('#industry_reg_no').prop('required', true);
            $('#industry_reg_date').prop('required', true);
        }else{
            $('#industry_reg_no').prop('required', false);
            $('#industry_reg_date').prop('required', false);
            $('#industry_reg_no, #industry_reg_date').val('');
            $('.ind_reg_no, .ind_reg_date').addClass('hidden');
        }
    }).change();

    $('#fire_insurance').change(function(){
        var fire_insurance_value = $(this).val();
        if(fire_insurance_value == 1){
            $('.fire_ins').removeClass('hidden');
            $('#fire_insurance_com').prop('required', true);
        }else{
            $('#fire_insurance_com').prop('required', false);
            $('#fire_insurance_com').val('');
            $('.fire_ins').addClass('hidden');
        }
    }).change();

    $('#local_labour_male, #local_labour_female, #foreign_director_male, #foreign_director_female, #foreign_technician_male, #foreign_technician_female, #foreign_dependent_male, #foreign_dependent_female').on('input', function() {
        const l_male = parseInt($('#local_labour_male').val()) || 0;
        const l_female = parseInt($('#local_labour_female').val()) || 0;
        const f_dir_male = parseInt($('#foreign_director_male').val()) || 0;
        const f_dir_female = parseInt($('#foreign_director_female').val()) || 0;
        const f_t_male = parseInt($('#foreign_technician_male').val()) || 0;
        const f_t_female = parseInt($('#foreign_technician_female').val()) || 0;
        const f_de_male = parseInt($('#foreign_dependent_male').val()) || 0;
        const f_de_female = parseInt($('#foreign_dependent_female').val()) || 0;
        const l_sum = l_male + l_female;
        const f_dir_sum = f_dir_male + f_dir_female;
        const f_t_sum = f_t_male + f_t_female;
        const f_de_sum = f_de_male + f_de_female;
        $('#local_labour_total').val(l_sum);
        $('#foreign_director_total').val(f_dir_sum);
        $('#foreign_technician_total').val(f_t_sum);
        $('#foreign_dependent_total').val(f_de_sum);
    });
});
