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




    


