$(document).ready(function(){
    load_data()
    prepare_fields()
    // calculate_progress('pg_profile',0, 0);
})


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
                load_data();
                document.getElementById("applicant_post_file").value=null; 
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
                load_data();
                document.getElementById("applicant_post_file").value=null; 
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
    
    $.ajax({

        type: 'post',
  
        url: 'api/dashboard/applicant/get_applicant_requirements.php',
  
        data:  {id: user_id},
  
        datatype: 'json',
  
        beforeSend: function() { },
  
        success: function (e) { append_to_table(e) },

        complete: function () { add_events(); },
  
        error: function(xhr) { display_error() },
  
    });

}

function load_data(){

    var user_type = $('.user_info').attr('ur');

    if ( user_type == 'APPLICANT' ){

        load_requirements()

    }


}


// TABS
function prepare_fields(){

    $('.form_bi').each(function(){

        $(this).attr('readonly','readonly')

    })

}


// BASIC INFORMATION
$('#btn_bi_update').on('click', function(){
    $('.form_bi').each(function(){ $(this).attr('readonly',false) })
    $(this).addClass('d-none');
    $('#btn_bi_save').removeClass('d-none');
})
$('#btn_bi_save').on('click', function(){

})

$('form#f_applicant_bi').on('submit', function(e){
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
            load_data();
            document.getElementById("applicant_post_file").value=null; 
        },
        error: function(xhr) { display_error() },
    });
})