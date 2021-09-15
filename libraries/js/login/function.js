$('#form_login').on('submit', function (e) {

    e.preventDefault();

    $.ajax({

      type: 'post',

      url: 'api/func/authenticate/authenticate.php',

      data:  {
                action: 'login',
                POSTDATA:{
                  token:$('#txt_token').val(),
                  email: $('#txt_email').val(),
                  password: $('#txt_password').val()
                }
              },

      datatype: 'json',

      beforeSend: function() {},

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




function validated_success(data)
{
    $('#modal_login').modal('show');

    $('.modal-body p').append(data.feedback);

    $('.modal-body i').addClass('far fa-check-circle fa-2x');

    $('.modal-body i').css('color','green');

    $('#btn_modal').text('Go to Login');
}