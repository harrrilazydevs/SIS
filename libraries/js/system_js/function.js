$('.ld-nav-item').on('click', function(){
    showPage($(this).attr('aria-page'))
})

$(document).ready(function(){

    if( getCookie('active_page') ){

        $('.page').each(function(){

            if(  getCookie('active_page') == $(this).attr('id') )
            {
                $(this).removeClass('d-none')
            }
            else
            {
                $(this).addClass('d-none')
            }
    
        })
      
    }

})

$('#btn_logout').on('click',function(){
    $.ajax({

        type: 'post',
  
        url: 'api/func/authenticate/logout.php',
  
        datatype: 'json',
  
        beforeSend: function() {
  
        },
  
        success: function (e) {
            if(e == 200){
                alert('helo')
            }
        },
  
        complete: function() {},
  
        error: function(xhr) { display_error() },
  
      });
})

function showPage(pagename){

    $('.page').each(function(){

        if( pagename == $(this).attr('id') )
        {
            $(this).removeClass('d-none')
            document.cookie ='active_page='+ $(this).attr('id');
        }
        else
        {
            $(this).addClass('d-none')
        }

    })

}
