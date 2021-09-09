$('#form_login').on('submit', function (e) {

    e.preventDefault();

    $.ajax({

      type: 'post',

      url: 'api/func/authenticate.php',

      data:  $('#form_login').serialize(),

      datatype: 'json',

      beforeSend: function() {

      },

      success: function (e) {

        $.each(e, function(key, val){

          if(val.status == 200)
          {
              validated_success(val.feedback)
          }

        })
     
      },

      complete: function() {},

      error: function(xhr) { display_error() },

    });

  });



  
  function validated_success(feedback)
    {
        $('#modal_login').modal('show');

        $('.modal-body p').append(feedback);

        $('.modal-body i').addClass('far fa-check-circle fa-2x');

        $('.modal-body i').css('color','green');

        $('#btn_modal').text('Go to Login');

    }