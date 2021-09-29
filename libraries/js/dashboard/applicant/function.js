$(document).ready(function(){

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    })

    load_effect();

    /* LOADS */

    load_list_school();
    load_requirements();

    // $('.tags-input').tagsinput();

    // update

    $('.f_btn_update').on('click', function(){

        $($(this).attr('form-class')).each(function(){ 
            $(this).attr('readonly',false) }
        )

        $(this).addClass('d-none');

        $($(this).attr('submit-btn-name')).removeClass('d-none');

    })

    // FUNCTION FOR CHANGING TAB PAGES
    var page = getCookie('page');
    if (page)
    {
        $('.tab-pane').each(function(){
            if ($(this).attr('id') === page){
                $(this).addClass('show')
                $(this).addClass('active')
            }
            else{
                $(this).removeClass('show')
                $(this).removeClass('active')
            }
        })
        $('.nav-link').each(function(){
            if ($(this).attr('href') === '#'+page){
                $(this).addClass('show')
                $(this).addClass('active')
            }
            else{
                $(this).removeClass('show')
                $(this).removeClass('active')
            }
        })
    }

})

// GLOBAL VARIABLES
var profile_tab = false;
var applicant_school = '';
var applicant_program = '';
var applicant_type_id = '';


// REQUIREMENTS
function append_to_table(data)
{
    var output = '';
    var row_count = 0;
    var completion = 0;

    $.each(data, function(key,v){

        row_count = row_count+1;
        output += '<tr class="clickable_tr" aria-file-dir="'+v.file_dir+'" aria-requirement-id="'+v.requirement_id+'" aria-record-id="'+v.id+'" aria-requirement="'+v.requirement_name+'" aria-file="'+v.file_name+'" aria-status="'+v.status+'">';
        output += '<td class="text-center">'+row_count+'</td>';
        output += '<td style="color:#007BFF !important">'+v.requirement_name+'</td>';

        if (v.status == 'SUBMITTED')
        {
            output += '<td class="text-center"> <i class="far fa-check-circle bg-warning i-design rounded-circle"></i> </td>';
        }
        else if (v.status == 'PENDING')
        {
            output += '<td class="text-center"> </td>';
        }
        else if (v.status == 'APPROVED')
        {
            output += '<td class="text-center"> <i class="far fa-check-circle bg-success i-design  rounded-circle"></i> </td>';
            completion = completion + 1;
        }
        else if (v.status == 'DECLINED')
        {
            output += '<td class="text-center"> <i class="far fa-times-circle bg-danger i-design  rounded-circle"></i> </td>';
        }
        output += '</tr>'
      
    })

    calculate_progress('pg_requirements',row_count, completion);

    $('#tbl_requirement tbody').empty();
    $('#tbl_requirement tbody').append(output);

}
function add_events(){

    $('form#form_modal_applicant_requirement').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'api/dashboard/applicant/post_applicant_requirement.php',
            data:  new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {},
            success: function (e) {
                if (e.status == 200)
                {
                    $('#md_applicant_post_requirement').modal('hide')
                    $('#modal_success .modal-body p').text(e.feedback)
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success').modal('show')
                }
                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_applicant_post_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }
            },
            complete: function() {
                load_requirements();
                document.getElementById("applicant_post_file").value=null; 
                location.reload();
            },
            error: function(xhr) { display_error() },
        });
    });

    $('form#form_modal_applicant_remove_requirement').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'api/dashboard/applicant/remove_applicant_requirement.php',
            data:  new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {},
            success: function (e) {
                if (e.status == 200)
                {
                    $('#md_confirm').modal('hide')
                    $('#modal_success .modal-body p').text(e.feedback)
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success').modal('show')
                    $('#modal_success').modal('show')
                }
                if (e.status == 500)
                {
                    window.location.href = '../../../../500.html';
                    console.log(e.feedback)
                }
            },
            complete: function() {
                load_requirements();
                document.getElementById("applicant_post_file").value=null;  
                location.reload();

            },
            error: function(xhr) { display_error() },
        });
    
    });
    
        
    $('.clickable_tr').on('click',function(){

        var status = $(this).attr('aria-status');
        var file_name = $(this).attr('aria-file');
        var requirement_id = $(this).attr('aria-requirement-id');
        var record_id = $(this).attr('aria-record-id');
        var requirement = $(this).attr('aria-requirement');
        var file_dir = $(this).attr('aria-file-dir');
        var applicant_id = $('.user_info').attr('id');
    
        $('#txt_modal_requirement_status').val(status)

        if (status == 'SUBMITTED' || status == 'DECLINED')
        {
            // display
            $('#md_applicant_post_requirement .modal-header h6').text('Requirement Information')
            $('#txt_status').text(status)
            $('#txt_requirement').text(requirement)
            $('.attached-document .file_name').text(file_name)
            $('#md_applicant_post_requirement #btn_submit').addClass('d-none')
            $('.attach-document').addClass('d-none')
            $('.attached-document').removeClass('d-none')
            $('.controls').removeClass('d-none')

            // functional
            $('#txt_requirement_id').val(requirement_id)
            $('#txt_applicant_id').val(applicant_id)
            $('#txt_record_id').val(record_id)
            $('#btn_r_attachment').attr('aria-id',record_id);
            $('#btn_dl_attachment').attr('file-dir', file_dir)
            $('#btn_dl_attachment').attr('file-name', file_name)

            $('#md_applicant_post_requirement').modal('show')
        }
        else if (status == 'APPROVED')
        {
            // display
            $('#md_applicant_post_requirement .modal-header h6').text('Requirement Information')
            $('#txt_requirement').text(requirement)
            $('.attached-document .file_name').text(file_name)
            $('#btn_r_attachment').addClass('d-none');
            $('.attach-document').addClass('d-none')
            $('#btn_e_attachment').addClass('d-none');
            $('#md_applicant_post_requirement #btn_submit').addClass('d-none')
            $('#btn_dl_attachment').removeClass('d-none');
            $('.controls ul').removeClass('border');
            $('.controls li').addClass('no-border');
            $('.attached-document').removeClass('d-none')
            $('.controls').removeClass('d-none')

            // functional

            $('#md_applicant_post_requirement').modal('show')
        }
        else
        {
            // display
            $('#md_applicant_post_requirement .modal-header h6').text('Submit Requirement')
            $('#txt_requirement').text(requirement)
            $('.controls').addClass('d-none')
            $('.attached-document').addClass('d-none');
            $('.attach-document').removeClass('d-none')
            $('#md_applicant_post_requirement #btn_submit').removeClass('d-none')

            // functional
            $('#txt_requirement_id').val(requirement_id)
            $('#txt_applicant_id').val(applicant_id)
            $('#txt_record_id').val(record_id)

            $('#md_applicant_post_requirement').modal('show')
        }

    })

    $('#btn_dl_attachment').on('click', function(e){ DL2('../../../'+$(this).attr('file-dir'),$(this).attr('file-name')) })

    $('#btn_e_attachment').on('click',function(){

        // display
        $('#md_applicant_post_requirement .modal-header h6').text('Edit Requirement')
        $('#md_applicant_post_requirement #btn_close').addClass('d-none')
        $('.attached-document').addClass('d-none')
        $('.controls').addClass('d-none')
        $('.attach-document').removeClass('d-none')
        $('#md_applicant_post_requirement #btn_submit').removeClass('d-none')
        $('#md_applicant_post_requirement #btn_back').removeClass('d-none')
       
    })

    $('#btn_back').on('click',function(){
        $('#md_applicant_post_requirement .modal-header h6').text('Requirement Information')
        $('.controls').removeClass('d-none')
        $('.attached-document').removeClass('d-none')
        $('#md_applicant_post_requirement #btn_submit').removeClass('d-none')
        $('#md_applicant_post_requirement #btn_close').removeClass('d-none')
        $('.attach-document').addClass('d-none')
        $('#md_applicant_post_requirement #btn_back').addClass('d-none')
    })

    $('#btn_r_attachment').on('click', function(e){ 
        $('#md_applicant_post_requirement').modal('hide')
        $('#md_confirm .modal-body p').text('Do you want to remove this attachment?')
        $('#form_modal_applicant_remove_requirement #txt_id').val($(this).attr('aria-id'))
        $('#md_confirm').modal('show')
    })
}
function load_requirements(){

    var user_id = $('.user_info').attr('id');

    data = $('#form_applicant_set_program').serializeArray();
    data.push({name: 'action', value:'get'},{name: 'id', value:user_id})

    $.ajax({

        type: 'get',
  
        url: 'api/dashboard/applicant/requirements.php',
  
        data: data,
  
        datatype: 'json',
  
        beforeSend: function() { },
  
        success: function (e) { 

            append_to_table(e)
        
        },

        complete: function () { add_events(); },
  
        error: function(xhr) { display_error() },
  
    });

}
function load_list_school(){
    $.ajax({ 
    type: 'get', 
    url: 'api/general/get_school_list.php', 
    datatype: 'json', 
    success: function (e){ 
        var output =''; 
        $.each(e, function(key,val){ output += '<option value="'+val.id+'">'+val.name+'</option>'; }); 
      
        $('#sel_bi_school').empty(); 
        $('#sel_bi_school').append(output);  

        // for modals
        $('#sel_school').empty(); 
        $('#sel_school').append(output);  

        
    }, 
    complete: function(){

        load_programs(1);

        // after loading school list, load profile
        load_profile();
    },
    error: function(xhr) { 
        display_error() }, 
    }); 
}
function load_programs(school_id){ 
    data = [];
    data.push({name: 'action', value:'get'}, {name: 'id', value:school_id})
    $.ajax({ type: 'get', 
    url: 'api/general/program.php', 
    data:data, 
    datatype: 'json', 
    success: function (e) 
    {
        var output ='<option value="0">-- Select a Program --</option>'; 

        $.each(e, function(key,val){ 

            if (val.id == applicant_program) output += '<option value="'+val.id+'" selected>'+val.name+'</option>'; 
            else  output += '<option value="'+val.id+'">'+val.name+'</option>'; 
           
        }); 

        $('#sel_bi_program').empty(); 
        $('#sel_bi_program').append(output); 

        $('#sel_program').empty(); 
        $('#sel_program').append(output);

    }, 
    error: function(xhr) { display_error() }, }); 
}
function load_profile(){

    if($('input[name="firstname"]').val() === ""){

        let data = [];
        data.push({name: 'action', value:'get'},{name:'id', value:$('.user_info').attr('id')})
        $.ajax({
            type: 'get',
            url: 'api/dashboard/applicant/profile.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {

                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_applicant_post_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }
                else
                {
                    // console.log(e)
                    $.each(e, function(key, val){

                        $('input[name="firstname"]').val(val.firstname);
                        $('input[name="middlename"]').val(val.middlename);
                        $('input[name="lastname"]').val(val.lastname);
                        $('input[name="suffix"]').val(val.suffix);
                        $('input[name="date_of_birth"]').val(val.date_of_birth);
                        $('input[name="place_of_birth"]').val(val.place_of_birth);
                        $('input[name="mobile_no"]').val(val.mobile_no);
                        $('input[name="religion"]').val(val.religion);
                        $('input[name="citizenship"]').val(val.citizenship);
                        $('select[name="gender"]').val(val.gender);
                        $('select[name="civil_status"]').val(val.civil_status);
                        $('#sel_profile_working_student').val(val.working)
                        
                        if(val.age >= 18){
                            $('input[name="age"]').val(val.age);
                        }

                        if (val.working == 1){
                            $('#div_position').removeClass('d-none');
                            $('#div_income').removeClass('d-none'); 
                            $('#div_company').removeClass('d-none');
                            $('input[name="company"]').val(val.company);
                            $('input[name="position"]').val(val.position);
                            $('input[name="income"]').val(val.income);
                        }else{
                            $('input[name="position"]').val('');
                            $('input[name="income"]').val('');
                            $('#div_position').addClass('d-none');
                            $('#div_income').addClass('d-none');
                        }
                       
                        applicant_school = val.school_id;
                        applicant_program = val.program_id;

                        // foreign or filipino
                        if (val.citizenship.toLowerCase() !== 'filipino' && val.citizenship){
                            $('#div_acr').removeClass('d-none')
                            $('#div_passport').removeClass('d-none')
    
                            $('input[name="acr_no"]').val(val.acr_no);
                            $('input[name="passport_no"]').val(val.passport_no);
                        }
                        else{
                            $('#div_acr').addClass('d-none')
                            $('#div_passport').addClass('d-none')
                        }
    
                        // single or married
                        if (val.civil_status.toLowerCase() !== 'single' && val.civil_status){
                            $('#div_spouse').removeClass('d-none')
                            $('input[name="spouse"]').val(val.spouse);
                        }
                        else{
                            $('#div_spouse').addClass('d-none')
                        }
    
                        // display set applicant type if null
                        if (typeof val.applicant_type === "undefined" || !val.applicant_type) {
                            set_applicant_type()
                        }
                        else{
                            applicant_type_id = val.applicant_type;
                        }

                    })
                }
            },
            complete: function() {
                if(applicant_type_id) get_applicant_type_name_by_id(applicant_type_id);
                $('#sel_bi_school').val(applicant_school).change()
                $('#sel_bi_program').val(applicant_program).change()

                // load address after loading profile
                load_address();
            },
            error: function(xhr) { 
                display_error() 
            },
        });

    }
}
function load_address(){

    let data = [];
    data.push({name: 'action', value:'get'},{name:'id', value:$('.user_info').attr('id')})
    $.ajax({
        type: 'get',
        url: 'api/dashboard/applicant/address.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(e) {

            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
            else{

                $.each(e, function(key,val){
                    $('input[name="city_no_st_sbdv"]').val(val.city_no_st_sbdv);
                    $('input[name="city_brgy"]').val(val.city_brgy);
                    $('input[name="city_city"]').val(val.city_city);
                    $('input[name="city_zipcode"]').val(val.city_zipcode);
                    $('input[name="province_no_st_sbdv"]').val(val.province_no_st_sbdv);
                    $('input[name="province_brgy"]').val(val.province_brgy);
                    $('input[name="province_city"]').val(val.province_city);
                    $('input[name="province_zipcode"]').val(val.province_zipcode);
                })
            }
        },
        complete: function(){
            
            // after load address load family
            load_family();

        }
    })

}
function load_family(){

    let data = [];
    data.push({name: 'action', value:'get'},{name:'id', value:$('.user_info').attr('id')})
    $.ajax({
        type: 'get',
        url: 'api/dashboard/applicant/family.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(e) {

            console.log(e)
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
            else{

                $.each(e, function(key,val){
                    $('input[name="no_siblings"]').val(val.no_siblings);
                    $('input[name="monthly_income"]').val(val.monthly_income);
                    $('input[name="father_name"]').val(val.father_name);
                    $('input[name="father_occupation"]').val(val.father_occupation);
                    $('input[name="father_mobile_no"]').val(val.father_mobile_no);
                    $('input[name="father_email"]').val(val.father_email);
                    $('input[name="mother_name"]').val(val.mother_name);
                    $('input[name="mother_occupation"]').val(val.mother_occupation);
                    $('input[name="mother_mobile_no"]').val(val.mother_mobile_no);
                    $('input[name="mother_email"]').val(val.mother_email);
                    $('input[name="guardian_name"]').val(val.guardian_name);
                    $('input[name="guardian_occupation"]').val(val.guardian_occupation);
                    $('input[name="guardian_mobile_no"]').val(val.guardian_mobile_no);
                    $('input[name="guardian_email"]').val(val.guardian_email);
                   
                })
            }
        },
        complete: function(){
            
            // after load address load family
            // load_family();

        }
    })
}
function set_applicant_type(){

    data = [];
    data.push({name: 'action', value:'get'})
    
    $.ajax({

        type: 'get',

        url: 'api/dashboard/administrator/applicant_type.php',

        data: data,

        datatype: 'json',

        beforeSend: function() { },

        success: function (e) { 

            var toAppend;
            var count = 1;

            $.each(e, function(key,val){
                
                toAppend += '<option value="'+val.id+'">'+val.name+'</option>';
            })

            $('select[name="applicant_type"]').empty();
            $('select[name="applicant_type"]').append(toAppend);
        },

        complete: function () { 

            $('#md_applicant_sel_program').modal('show')

        },

        error: function(xhr) { },

    });
}
function get_applicant_type_name_by_id(id){

    data = [];
    data.push({name: 'action', value:'get'})
    data.push({name: 'id', value:id})
    
    $.ajax({
        type: 'get',
        url: 'api/dashboard/applicant/get_applicant_type.php',
        data: data,
        datatype: 'json',
        beforeSend: function() { },
        success: function (e) { 
            $('#txt_applicant_type').text(e[0].name)
        },
        complete: function () { },
        error: function(xhr) { },
    });
}





// SET PROGRAM
$('form#form_applicant_set_program').on('submit', function(e){
    e.preventDefault();
    data = $('#form_applicant_set_program').serializeArray();
    data.push({name: 'action', value:'put'})
    $.ajax({
        type: 'post',
        url: 'api/dashboard/applicant/program.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {},
        success: function (e) {

            if (e == 200)
            {
                $('#md_applicant_sel_program').modal('hide')
                $('#modal_success .modal-body p').text('Program selected successfully.')
                $('#modal_success .modal-footer button').text('Close');
                $('#modal_success .modal-footer button').addClass('click_reload');
                $('#modal_success').modal('show')
            }
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#md_applicant_sel_program').modal('hide')
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }

            
        },
        complete: function() {

            // location.reload();
          
        },
        error: function(xhr) { display_error() },
    });
})


// PROFILE
$('#btn_bi_update').on('click', function(){
    $('.form_bi').each(function(){ $(this).attr('readonly',false) })
    $(this).addClass('d-none');
    $('#btn_bi_save').removeClass('d-none');
})

$('form#f_applicant_bi').on('submit', function(e){

    e.preventDefault();

    data = $('#f_applicant_bi').serializeArray();
    data.push({name: 'action', value:'post'})
    $.ajax({
        type: 'post',
        url: 'api/dashboard/applicant/profile.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {},
        success: function (e) {

            if (e == 200)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_success .modal-body p').text('Profile updated successfully.')
                $('#modal_success .modal-footer button').text('Close');
                $('#modal_success .modal-footer button').addClass('click_reload');
                $('#modal_success').modal('show')
            }
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
        },
        complete: function() {

            document.cookie = "page=nav_profile";
        
        },
        error: function(xhr) { display_error() },
    });

  
  

})

var applicant_citizenship = '';

$('#txt_citizenship').on('click',function(){
    applicant_citizenship = $(this).val().toLowerCase();
})
$('#txt_citizenship').on('change',function(){

    if ( applicant_citizenship != $(this).val().toLowerCase() )
    {
        if($(this).val().toLowerCase() !== 'filipino' && applicant_citizenship == 'filipino')
        {
            $('#md_not_filipino').modal('show')
            $('#div_acr').removeClass('d-none')
            $('#div_passport').removeClass('d-none')
        }
        else
        {
            if( applicant_citizenship != 'filipino' )
            {
                $('#md_filipino').modal('show')
            }
            
            $('#div_acr').addClass('d-none')
            $('#div_passport').addClass('d-none')
            $('#div_acr').val('')
            $('#div_passport').val('')
        }   
    }

    
})
$('#md_btn_not_filipino_cancel').on('click', function(){
    $('#txt_citizenship').val('Filipino');
    $('#div_acr').addClass('d-none')
    $('#div_passport').addClass('d-none')
    $('#div_acr').val('')
    $('#div_passport').val('')
})
$('#md_btn_not_filipino_update').on('click', function(){
    $('#md_not_filipino').modal('hide')
    get_applicant_type();
    $('#md_applicant_sel_program').modal('show')
})
$('#md_btn_filipino_update').on('click', function(){
    $('#md_filipino').modal('hide')
    get_applicant_type();
    $('#md_applicant_sel_program').modal('show')
})
$('#txt_civil_status').on('change',function(){
    if($(this).val().toLowerCase() === 'married')
    {
        $('#div_spouse').removeClass('d-none')
    }
    else{
        $('#div_spouse').addClass('d-none')
    }
})
$('#sel_profile_working_student').on('change', function(){
    if ( $(this).val() === '1' ){
        $('#div_company').removeClass('d-none')
        $('#div_position').removeClass('d-none')
        $('#div_income').removeClass('d-none')
    }else{
        $('#div_company').addClass('d-none')
        $('#div_position').addClass('d-none')
        $('#div_income').addClass('d-none')
        $('#txt_bi_position').val('')
        $('#txt_bi_income').val('')
        $('#txt_bi_company').val('')
    }
})



// PROGRAM
$('#sel_bi_school').on('change', function(){ 
    load_programs($(this).val()); 
})
$('#sel_bi_program').on('change', function(){ 
    if(applicant_program) $(this).val() == applicant_program ? $('#btn_program_submit').addClass('d-none') : $('#btn_program_submit').removeClass('d-none');
})
$('form#f_applicant_program').on('submit', function(e){
    e.preventDefault();
    data = $('#f_applicant_program').serializeArray();
    data.push({name: 'action', value:'put'},{name: 'applicant_type', value:applicant_type_id})
    $.ajax({
        type: 'post',
        url: 'api/dashboard/applicant/program.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {},
        success: function (e) {

            console.log(e)

            if (e == 200)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_success .modal-body p').text('Profile updated successfully.')
                $('#modal_success .modal-footer button').text('Close');
                $('#modal_success .modal-footer button').addClass('click_reload');
                $('#modal_success').modal('show')
            }
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
        },
        complete: function() {

            document.cookie = "page=nav_degree";
          
        },
        error: function(xhr) { display_error() },
    });
})


// ADDRESS
$('#btn_address_update').on('click', function(){
    $('.form_address').each(function(){ $(this).attr('readonly',false) })
    $(this).addClass('d-none');
    $('#btn_address_save').removeClass('d-none');
})
$('form#f_applicant_address').on('submit', function(e){
    e.preventDefault();
    data = $('#f_applicant_address').serializeArray();
    data.push({name: 'action', value:'post'})
    $.ajax({
        type: 'post',
        url: 'api/dashboard/applicant/address.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {},
        success: function (e) {
            if (e == 200)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_success .modal-body p').text('Address updated successfully.')
                $('#modal_success .modal-footer button').text('Close');
                $('#modal_success .modal-footer button').addClass('click_reload');
                $('#modal_success').modal('show')
            }
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
        },
        complete: function() {

            document.cookie = "page=nav-mailing_address";
          
        },
        error: function(xhr) { display_error() },
    });
})

// FAMILY
$('form#f_applicant_family').on('submit', function(e){
    e.preventDefault();
    data = $('#f_applicant_family').serializeArray();
    data.push({name: 'action', value:'post'})
    $.ajax({
        type: 'post',
        url: 'api/dashboard/applicant/family.php',
        data:  data,
        dataType: 'json',
        beforeSend: function() {},
        success: function (e) {
            if (e == 200)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_success .modal-body p').text('Family record updated successfully.')
                $('#modal_success .modal-footer button').text('Close');
                $('#modal_success .modal-footer button').addClass('click_reload');
                $('#modal_success').modal('show')
            }
            if (e.status == 403 || e.status == 400 || e.status == 500)
            {
                $('#md_applicant_post_requirement').modal('hide')
                $('#modal_fail .modal-body p').text(e.feedback)
                $('#modal_fail .modal-footer button').text('Close');
                $('#modal_fail').modal('show')
            }
        },
        complete: function() {

            document.cookie = "page=nav-family_record";
          
        },
        error: function(xhr) { display_error() },
    });
})









// nav link function
$('.ld_nav_link').on('click', function(){

    load_effect();

    // set cookie for page 
    document.cookie = "page="+$(this).attr('href').substring(1);

    if( $(this).attr('href').substring(1) === 'nav_profile'){
        load_profile()
    }


})

function load_effect(){

    $('.tab_loading').removeClass('d-none');
    $('.tab_content').addClass('d-none');

    setTimeout(function(){
        $('.tab_loading').addClass('d-none');
        $('.tab_content').removeClass('d-none');
    },700)

}