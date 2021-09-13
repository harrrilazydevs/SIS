$('#form_register').on('submit', function (e) {

    e.preventDefault();

    $.ajax({

      type: 'post',

      url: 'api/register/register.php',

      data:  $('#form_register').serialize(),

      datatype: 'json',

      beforeSend: function() {

      },

      success: function (e) {

       
     
      },

      complete: function() {},

      error: function(xhr) { display_error() },

    });

});


// PARA SA COMPLETE REGISTER
$('#form_complete_register').on('submit', function (e) {

  e.preventDefault();

  $.ajax({

    type: 'post',

    url: 'api/dummy-test.php',

    data:  $('#form_complete_register').serialize(),

    datatype: 'json',

    beforeSend: function() { },

    success: function (e) {

      // 200 if success
      // 403 if not success
      // 500 please contact admin

      if( e.status == 200){

        $('#m_l_register_success').modal('show')

      }

      if( e.status == 403){

        $('#m_l_register_fail').modal('show')

      }

      if( e.status == 500){

        $('#m_l_register_500').modal('show')

      }
      

     
   
    },

    complete: function() {},

    error: function(xhr) { display_error() },

  });

});










// $.ajax({

//   type: 'post',

//   url: 'api/func/authenticate/authenticate.php',

//   data:  {
//             token:$('#txt_token').val(),
//             action: 'login',
//             POSTDATA:{
//               firstname: $('#txt_fname').val(),
//               middlename: $('#txt_mname').val(),
//               lastname: $('#txt_lname').val(),
//               suffix: $('#txt_suffix').val()
//             }
//           },

//   datatype: 'json',

//   beforeSend: function() {},

//   success: function (e) {

//     $.each(e, function(key, val){

//       if ( val.status == 200 )
//       {
//           validated_success(val)
//       }

//       if ( val.status == 403 )
//       {

//       }


//     })
 
//   },

//   complete: function() {},

//   error: function(xhr) { display_error() },

// });






$(document).ready(function(){
  load_school_list()


})

function load_school_list(){ $.ajax({ type: 'post', url: 'api/general/get_school_list.php', datatype: 'json', success: function (e) { var output =''; $.each(e, function(key,val){ output += '<option value="'+val.id+'">'+val.name+'</option>'; }); $('#sel_school').append(output); }, error: function(xhr) { display_error() }, }); }

function load_programs(school_id){ $.ajax({ type: 'post', url: 'api/general/get_program_list.php', data: {id:school_id}, datatype: 'json', success: function (e) { var output =''; $.each(e, function(key,val){ output += '<option value="'+val.id+'">'+val.name+'</option>'; }); $('#sel_program').empty(); $('#sel_program').append(output);  }, error: function(xhr) { display_error() }, }); }

$('#sel_school').on('change', function(){ load_programs($(this).val()); })

    


