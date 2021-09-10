$(document).ready(function(){
    loadData()
})






function append_to_table(data)
{
    var output = '';
    var row_count = 1;

    $.each(data, function(key,v){

        output += '<tr class="clickable_tr" aria-requirement-id="'+v.id+'" aria-requirement="'+v.requirement_name+'" aria-file="'+v.file_name+'" aria-status="'+v.status+'">';
        output += '<td class="text-center">'+row_count+'</td>';
        output += '<td >'+v.requirement_name+'</td>';

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

    $('#form_modal_applicant_requirement').on('submit', function (e) {

        e.preventDefault();
    
        $.ajax({
    
          type: 'post',
    
          url: 'api/dashboard/applicant/post_applicant_requirement.php',

          data:  new FormData(this),

          contentType: false,
          
        cache: false,

          processData:false,
          
          beforeSend: function() {
    
          },
    
          success: function (e) {
    
           
         
          },
    
          complete: function() {},
    
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
        var requirement = $(this).attr('aria-requirement');
    
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


