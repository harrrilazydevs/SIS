$(document).ready(function(){

    prepare_fields();
    load_effect();

    /* LOADS */

    // $('#md_applicant_first_login').modal('show');

    load_list_school();
    load_profile();
    load_requirements();

    

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


// variables
var profile_tab = false;


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
    data.push({name: 'action', value:'get'})
    data.push({name: 'id', value:user_id})
    
    $.ajax({

        type: 'post',
  
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



function load_profile(){

    if($('input[name="firstname"]').val() === ""){

        let data = [];
        data.push({name: 'action', value:'get'},{name:'id', value:$('.user_info').attr('id')})
        $.ajax({
            type: 'post',
            url: 'api/dashboard/applicant/profile.php',
            data:  data,
            dataType: 'json',
            beforeSend: function() {},
            success: function (e) {
                
                $.each(e, function(key, val){

                    $('input[name="firstname"]').val(val.firstname);
                    $('input[name="middlename"]').val(val.middlename);
                    $('input[name="lastname"]').val(val.lastname);
                    $('input[name="suffix"]').val(val.suffix);
                    $('input[name="date_of_birth"]').val(val.date_of_birth);
                    $('input[name="age"]').val(val.age);
                    $('input[name="place_of_birth"]').val(val.place_of_birth);
                    $('input[name="mobile_no"]').val(val.mobile_no);
                    $('select[name="gender"]').val(val.gender);
                    $('input[name="religion"]').val(val.religion);
                    $('select[name="civil_status"]').val(val.civil_status);
                    $('input[name="citizenship"]').val(val.citizenship);
                    
                    $('#sel_school_id').val(val.school_id).change()
                    $('#sel_program').val(val.program_id).change()

                    // foreign or filipino
                    if (val.citizenship.toLowerCase() !== 'filipino'){
                        $('#div_acr').removeClass('d-none')
                        $('#div_passport').removeClass('d-none')

                        $('input[name="acr_no"]').val(val.acr_no);
                        $('input[name="passport_no"]').val(val.passport_no);
                    }
                    else
                    {
                        $('#div_acr').addClass('d-none')
                        $('#div_passport').addClass('d-none')
                    }

                    // single or married
                    if (val.civil_status.toLowerCase() !== 'single'){
                        $('#div_spouse').removeClass('d-none')
                        $('input[name="spouse"]').val(val.spouse);
                    }
                    else{
                        $('#div_spouse').addClass('d-none')
                    }

                    // display set applicant type if null
                    if (typeof val.applicant_type === "undefined" || !val.applicant_type) {
                        $('#md_applicant_sel_program').modal('show')
                    }

                })

                if (e.status == 403 || e.status == 400 || e.status == 500)
                {
                    $('#md_applicant_post_requirement').modal('hide')
                    $('#modal_fail .modal-body p').text(e.feedback)
                    $('#modal_fail .modal-footer button').text('Close');
                    $('#modal_fail').modal('show')
                }
                else
                {
                    
                }
            },
            complete: function() {},
            error: function(xhr) { display_error() },
        });

    }
}



function load_list_school(){
    $.ajax({ 
    type: 'post', 
    url: 'api/general/get_school_list.php', 
    datatype: 'json', 
    success: function (e){ 
        var output =''; 
        $.each(e, function(key,val){ output += '<option value="'+val.id+'">'+val.name+'</option>'; }); 
        load_programs(1);
        $('#sel_school').empty(); $('#sel_school').append(output);  
    }, 
    error: function(xhr) { 
        display_error() }, 
    }); 
}

function load_programs(school_id){ 
    $.ajax({ type: 'post', 
    url: 'api/general/get_program_list.php', 
    data: {id:school_id}, 
    datatype: 'json', success: function (e) 
    { var output =''; $.each(e, function(key,val){ output += '<option value="'+val.id+'">'+val.name+'</option>'; }); $('#sel_program').empty(); $('#sel_program').append(output);  }, error: function(xhr) { display_error() }, }); 
}



// TABS
function prepare_fields(){

    // set read-only pag kaload
    $('.form_bi').each(function(){ $(this).attr('readonly','readonly') })

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

            location.reload();
          
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
$('#txt_citizenship').on('change',function(){
    if($(this).val().toLowerCase() !== 'filipino')
    {
        $('#md_not_filipino').modal('show')
        $('#div_acr').removeClass('d-none')
        $('#div_passport').removeClass('d-none')
    }
    else
    {
        $('#div_acr').addClass('d-none')
        $('#div_passport').addClass('d-none')
        $('#div_acr').val('')
        $('#div_passport').val('')
    }
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


// PROGRAM
$('#sel_school').on('change', function(){ load_programs($(this).val()); })



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