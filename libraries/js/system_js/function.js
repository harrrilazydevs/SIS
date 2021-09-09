$('#btn_open_cashin').on('click', function(){
    $('#modal_cashin').modal('show')
})

$('#btn_open_cashout').on('click', function(){
    $('#modal_cashout').modal('show')
})

$('#btn_dashboard').on('click', function(){
    showPage( $(this).attr('aria-page') )
})

$('#btn_cashincashout').on('click', function(){
    showPage($(this).attr('aria-page'))
})

$('#btn_bets').on('click', function(){
    showPage($(this).attr('aria-page'))
})

$('#btn_winnings').on('click', function(){
    showPage($(this).attr('aria-page'))
})

$('#btn_registrar_admission').on('click', function(){
    showPage($(this).attr('aria-page'))
})


function showPage(pagename){

    $('.page').each(function(){

        if( pagename == $(this).attr('id') )
        {
            $(this).removeClass('d-none')
        }
        else
        {
            $(this).addClass('d-none')
        }

    })

}

// window.onbeforeunload = function(e) {
//     return 'Dialog text here.';
// };


$(document).ready(function(){

   


    


})

$('#btn_logout').on('click',function(){
    $.ajax({

        type: 'post',
  
        url: 'api/func/authenticate/logout.php',
  
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
})