$( document ).ready(function() {
    
    // loadData();


    
});


function append_to_table(data)
{
    var output = '';
    var row_count = 1;

    $.each(data, function(key,v){

        output += '<tr class="clickable_tr" aria-requirement-id="'+v.id+'" aria-file="'+v.file_name+'" aria-status="'+v.status+'">';
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
    
          url: 'api/dashboard/post_applicant_requirement.php',

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

    function getFooterButton(value, button_type = 'close')
    {
        var output = '';
        if( button_type == 'close'){
            output = '<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> '+value+' </button>';
        }
        else if( button_type == 'download'){
            output = '<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"> '+value+' </button>';
        }
        else{
            output = '<button type="submit" class="btn btn-sm btn-primary"> '+value+' </button>';
        }
        return output;
    }

    function getBodyFields(value, name, label, label_class = 'mt-3', field_type = 'input', field_status = 'active')
    {
        var output = '';
        if( field_type == 'input'){
            if( field_status == 'active'){
                output = '<label class="'+label_class+'"> '+label+' </label><input type="text" name="'+name+'" class="form-control" value="'+value+'">';
            }
            else if( field_status == 'readonly'){
                output = '<label class="'+label_class+'"> '+label+' </label><input type="text" name="'+name+'" class="form-control" value="'+value+'" readonly>';
            }
            else if( field_status == 'hidden'){
                output = '<label class="'+label_class+'"> '+label+' </label><input type="text" name="'+name+'" class="form-control" value="'+value+'" hidden>';
            }
        }
        else{
            output = '<label class="'+label_class+'"> '+label+' </label><input type="file" name="'+name+'" class="form-control-file py-2 px-1" style="border: 1px dashed gray !important; border-radius: 8px;">';
        }
        return output;
    }

    $('.clickable_tr').on('click',function(){

        var status = $(this).attr('aria-status');
        var file_name = $(this).attr('aria-file');
        var requirement_id = $(this).attr('aria-requirement-id');
       
        $('#txt_modal_requirement_status').val(status)

        if (status == 'SUBMITTED' || status == 'DECLINED')
        {
            $('#modal_requirement .modal-body').empty();
            $('#modal_requirement .modal-body').append(getBodyFields(requirement_id,'requirement_id','','','input','hidden'));
            $('#modal_requirement .modal-body').append(getBodyFields(status,'status','Status','','input','readonly'));
            $('#modal_requirement .modal-body').append(getBodyFields(file_name,'file_name','Attached Requirement','mt-3','input','readonly'));
            $('#modal_requirement .modal-footer').empty();
            $('#modal_requirement .modal-footer').append(getFooterButton('Close'));
            $('#modal_requirement .modal-footer').append(getFooterButton('Download','download'));
            $('#modal_requirement .modal-footer').append(getFooterButton('Edit Submitted','submit'));
        }
        else if (status == 'APPROVED')
        {
            $('#modal_requirement .modal-body').empty();
            $('#modal_requirement .modal-body').append(getBodyFields(requirement_id,'requirement_id','','','input','hidden'));
            $('#modal_requirement .modal-body').append(getBodyFields(status,'status','Status','','input','readonly'));
            $('#modal_requirement .modal-body').append(getBodyFields(file_name,'file_name','Attached Requirement','mt-3','input','readonly'));
            $('#modal_requirement .modal-footer').empty();
            $('#modal_requirement .modal-footer').append(getFooterButton('Close'));
        }
        else
        {
            $('#modal_requirement .modal-body').empty();
            $('#modal_requirement .modal-body').append(getBodyFields(requirement_id,'requirement_id','','','input','hidden'));
            $('#modal_requirement .modal-body').append(getBodyFields(status,'status','Status','','input','readonly'));
            $('#modal_requirement .modal-body').append(getBodyFields(file_name,'file_name','Attached Requirement','mt-3','file'));
            $('#modal_requirement .modal-footer').empty();
            $('#modal_requirement .modal-footer').append(getFooterButton('Close'));
            $('#modal_requirement .modal-footer').append(getFooterButton('Submit','submit'));
        }

        $('#modal_requirement').modal('show')
    })

    
    
}

function loadData(){

    $.ajax({

        type: 'post',
  
        url: 'api/dashboard/get_applicant_requirements.php',
  
        data:  {id: 3},
  
        datatype: 'json',
  
        beforeSend: function() {
  
        },
  
        success: function (e) {
            append_to_table(e)
        },

        complete: function (e) {
            addEvents()
        },
  
        error: function(xhr) { display_error() },
  
    });

}

