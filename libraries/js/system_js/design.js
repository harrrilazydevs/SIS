// SIDEBAR JS
$(document).ready(function($) {

   compute_age();

    var bsDefaults = {
          offset: false,
          overlay: true,
          width: '290px'
       },
       bsMain = $('.bs-offset-main'),
       bsOverlay = $('.bs-canvas-overlay');
 
    $('[data-toggle="canvas"][aria-expanded="false"]').on('click', function() {
       var canvas = $(this).data('target'),
          opts = $.extend({}, bsDefaults, $(canvas).data()),
          prop = $(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left';
 
       if (opts.width === '100%')
          opts.offset = false;
       
       $(canvas).css('width', opts.width);
       if (opts.offset && bsMain.length)
          bsMain.css(prop, opts.width);
 
       $(canvas + ' .bs-canvas-close').attr('aria-expanded', "true");
       $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr('aria-expanded', "true");
       if (opts.overlay && bsOverlay.length)
          bsOverlay.addClass('show');
       return false;
    });
 
    $('.bs-canvas-close, .bs-canvas-overlay').on('click', function() {
       var canvas, aria;
       if ($(this).hasClass('bs-canvas-close')) {
          canvas = $(this).closest('.bs-canvas');
          aria = $(this).add($('[data-toggle="canvas"][data-target="#' + canvas.attr('id') + '"]'));
          if (bsMain.length)
             bsMain.css(($(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left'), '');
       } else {
          canvas = $('.bs-canvas');
          aria = $('.bs-canvas-close, [data-toggle="canvas"]');
          if (bsMain.length)
             bsMain.css({
                'margin-left': '',
                'margin-right': ''
             });
       }
       canvas.css('width', '');
       aria.attr('aria-expanded', "false");
       if (bsOverlay.length)
          bsOverlay.removeClass('show');
       return false;
    });
 });

$('#username_a').on('click',function(){
   $('#modal_user').modal('show')
})
 //  SIDEBAR JS

$('.click_reload').on('click', function(){
   location.reload();
})



function getCookie(cname) {
   let name = cname + "=";
   let decodedCookie = decodeURIComponent(document.cookie);
   let ca = decodedCookie.split(';');
   for(let i = 0; i <ca.length; i++) {
     let c = ca[i];
     while (c.charAt(0) == ' ') {
       c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
       return c.substring(name.length, c.length);
     }
   }
   return "";
 }




//  DOWNLOAD FILE
function DL2(filed,file_name) { fetch(filed) .then(resp => resp.blob()) .then(blob => { const url = window.URL.createObjectURL(blob); const a = document.createElement('a'); a.style.display = 'none'; a.href = url; a.download = file_name; document.body.appendChild(a); a.click(); window.URL.revokeObjectURL(url); }) .catch(() => alert('oh no!')); }

// COMPUTE AGE
function compute_age(){ $('.birthdate').on('change', function(){ dob = new Date($(this).val()); var today = new Date(); var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000)); $('#'+$(this).attr('aria-age')).val(age); }) }

//  PROGRESS
function progress(id,value){ var progress = document.getElementById(id); progress.innerText = value+'%'; if(value == 0) { progress.style.color = "#000"; progress.style.paddingLeft = "1rem"; } else { var counter = 0; var count = 4; var loading = setInterval(animate, 10); function animate(){ if(count == 30) { clearInterval(loading); } else { progress.style.color = "white"; progress.style.background = "#007BFF"; progress.style.paddingLeft = "3rem"; while (counter < value){ counter = counter+1; progress.style.width =  counter+ '%'; percent.textContent = counter + '%'; } } } } }
function calculate_progress(progress_bar,data_count, data_completed){ var completed = data_completed /  data_count ; completed = completed * 100; progress(progress_bar,completed) }