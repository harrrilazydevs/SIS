

$("form#form_input_enrollee").submit(function(e) {
    e.preventDefault();    

    $.ajax({
        url:'api/temporary/post_enrollee_data.php',
        type: 'POST',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          
            if(data.status == 200)
            {
                $('#modal_success .modal-body p').empty();
                $('#modal_success .modal-body p').append(data.feedback);
                $('#modal_success .modal-footer button').append('Close');
                $('#modal_success').modal('show');

                $('#modal_input_enrollee').modal('hide');
            }
         
        }
     
    });
});


$(document).ready(function(){

    $.ajax({

        type: 'post',
  
        url: 'api/temporary/get_import_list.php',
  
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

})


function append_to_table(data)
{
    var output = '';
    var row_count = 1;

    $.each(data, function(key,v){

        output += '<tr class="clickable_tr">';
        output += '<td class="text-center">'+row_count+'</td>';
        output += '<td >'+v.file_dir+'</td>';
        output += '<td class="text-center">'+v.inputted_by+'</td>';
        output += '<td class="text-center">'+v.date_enrolled+'</td>';
      
        row_count = row_count+1;
    })

    $('#tbl_requirement tbody').empty();
    $('#tbl_requirement tbody').append(output);

}