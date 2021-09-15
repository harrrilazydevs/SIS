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

        $.each(e, function(key, val){
          if (val.status == 200)
          {
              validated_success(val)
          }
        })
      },

      complete: function() {},

      error: function(xhr) { display_error() },

    });

});


// PARA SA COMPLETE REGISTER
$('#form_change_password').on('submit', function (e) {

  e.preventDefault();

  $.ajax({

    type: 'post',

    url: 'api/func/change_password.php',

    data: {
            action: 'change_pass',
            POSTDATA:{
              token: $('#txt_token').val(),
              id: $('#txt_id').val(),
              password: $('#txt_password').val()
            }
          },

    datatype: 'json',

    beforeSend: function() { },

    success: function (e) {
      $.each(e, function(key, val){
        if (val.status == 200)
        {
          $('#modal_login').modal('show');

          $('.modal-body p').append(val.feedback);

          $('.modal-body i').addClass('far fa-check-circle fa-2x');

          $('.modal-body i').css('color','green');

        }
      })
    },

    complete: function() {},

    error: function(xhr) { display_error() },

  });

});






