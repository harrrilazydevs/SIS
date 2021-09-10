
// $('#btn_registrar_admission').on('click', function(){
    
//     loadData();

// })

// function loadData(){

//     $.ajax({

//         type: 'post',
  
//         url: 'api/dashboard/registrar/get_applicant_information.php',
  
//         datatype: 'json',
  
//         beforeSend: function() {
  
//         },
  
//         success: function (e) {
//           append_to_table(e, '')
//         },

//         complete: function (e) {
//             addEvents()
//         },
  
//         error: function(xhr) { display_error() },
  
//     });

// }


// function append_to_table(data, tablename)
// {
//     var output = '';
//     var row_count = 1;

//     $.each(data, function(key,v){

//         output += '<tr class="clickable_tr" aria-requirement-id="'+v.id+'" aria-file="'+v.file_name+'" aria-status="'+v.status+'">';
//         output += '<td class="text-center">'+row_count+'</td>';
//         output += '<td >'+v.requirement_name+'</td>';

//         output += '</tr>'
            
      
//         row_count = row_count+1;
//     })

//     $('#'+tablename+' tbody').empty();
//     $('#'+tablename+' tbody').append(output);

// }