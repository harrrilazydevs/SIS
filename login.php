<?php
    $page_title = 'Applicant Login';
    include_once 'inc/header.php'; 
?>

<div class="content sis_content" >


    <div class="content-inside">

      <div class="container my-5">

        <div class="form_container mx-auto px-4 py-4">

          <div class="row">

            <div class="col text-center">

              <img src="libraries/img/logo.png" alt="" style="height:90px !important;">
          
            </div>
            
          </div>

          <form method="post" id="form_login">
            
          <div class="row mt-3">
            <div class="col text-center ">
              <h5> Applicant Login</h5>
            </div>
          </div>

          <div class="row mt-2">

            <div class="col">

              <label class="mt-2"><i class="fas fa-at fa-fw pr-2"></i> Email</label>
              <input type="email" class="form-control" name="email" id="txt_email" required>
          
            </div>
            
          </div>

          <div class="row mt-1">

            <div class="col">

              <label class="mt-2"><i class="fas fa-lock fa-fw pr-2"></i> Password</label>
              <input type="password" name="password" id="password" maxlength="32" class="input-style form-control py-0" aria-label="#lbl_mobileno" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" aria-feedback="fb_mobile_no">

              <div class="text-right">
              <a href="terms_conditions.html">Forgot Password</a>
              </div>

            </div>
            
          </div>

          <div class="row">

            <div class="col text-center mt-4" style="width: 30vw;">

             <button class="btn">Log In</button>
                       
            </div>
            
          </div>

          </form>

          <div class="row">

            <div class="col text-center mt-1" style="width: 30vw; ">

              <a for="">Not yet Registered?</a>
              <a href="register.php" style="color:#E6E6E6 !important;"><u> Click here </u></a>
                      
            </div>

          </div>


        </div>
     
      </div>
   

    </div>
  
</div>

<?php include_once 'inc/modals.php'; ?>

<?php include_once 'inc/footer.php'; ?>


<footer class="footer bg-main-color text-light text-center py-2" style="font-size: 10pt !Important;">
    <p>
        2021 © All Rights Reserved by <a href="" class="pt-5 font-weight-bold" style="text-decoration: none; color: #3AC7EC !important;">Lazy Developers PH</a>
    </p>
</footer>




