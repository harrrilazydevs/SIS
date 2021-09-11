$(document).ready(function(){
    loadData()
})






function append_to_table(data)
{
    var output = '';
    var row_count = 1;

    $.each(data, function(key,v){

        output += '<tr class="clickable_tr" aria-requirement-id="'+v.requirement_id+'" aria-record-id="'+v.id+'" aria-requirement="'+v.requirement_name+'" aria-file="'+v.file_name+'" aria-status="'+v.status+'">';
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
        }
        else if (v.status == 'DECLINED')
        {
            output += '<td class="text-center"> <i class="far fa-times-circle bg-danger i-design  rounded-circle"></i> </td>';
        }
        output += '</tr>'
            
      
        row_count = row_count+1;
    })

    $('#tbl_requirement tbody').empty();
    $('#tbl_requirement tbody').append(output);

}


function addEvents(){

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

            beforeSend: function() {

            },

            success: function (e) {

                if (e.status == 200)
                {
                    $('#md_applicant_post_requirement').modal('hide')
                    $('#modal_success .modal-body p').text(e.feedback)
                    $('#modal_success .modal-footer button').text('Close');
                    $('#modal_success').modal('show')
                  
                   
                }

            },

            complete: function() {
                loadData();
                document.getElementById("applicant_post_file").value=null; 
            },

            error: function(xhr) { display_error() },

        });
    
    });

    var user_type = $('.user_info').attr('ur'); 

    if (user_type == 'APPLICANT')
    {
        
    }
        
    $('.clickable_tr').on('click',function(){

        var status = $(this).attr('aria-status');
        var file_name = $(this).attr('aria-file');
        var requirement_id = $(this).attr('aria-requirement-id');
        var record_id = $(this).attr('aria-record-id');
        var requirement = $(this).attr('aria-requirement');
        var applicant_id = $('.user_info').attr('id');
    
        $('#txt_modal_requirement_status').val(status)

        if (status == 'SUBMITTED' || status == 'DECLINED')
        {
        
        }
        else if (status == 'APPROVED')
        {
        
        }
        // if for post
        else
        {
            $('#txt_requirement').text(requirement)
            $('#txt_requirement_id').val(requirement_id)
            $('#txt_applicant_id').val(applicant_id)
            $('#txt_record_id').val(record_id)
            $('#md_applicant_post_requirement').modal('show')
        }

    })
    
}

function load_requirements(){

    var user_id = $('.user_info').attr('id');
    
    $.ajax({

        type: 'post',
  
        url: 'api/dashboard/applicant/get_applicant_requirements.php',
  
        data:  {id: user_id},
  
        datatype: 'json',
  
        beforeSend: function() {
  
        },
  
        success: function (e) {
            append_to_table(e)
        },

        complete: function () {
            addEvents()
        },
  
        error: function(xhr) { display_error() },
  
    });

}

function loadData(){

    var user_type = $('.user_info').attr('ur');

    if ( user_type == 'APPLICANT' ){

        load_requirements()

    }


}



