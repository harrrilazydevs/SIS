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