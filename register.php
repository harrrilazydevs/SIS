<?php
    $page_title = 'Applicant Register';
    include_once 'inc/header.php'; 
    include_once 'api/func/authenticate/generate.php'; 

    

    if (!isset($_SESSION)) 
    { 
      session_start(); 
      regenerate_token();
    }

?>

<?php include_once 'inc/modals.php'; ?>

<div class="content sis_content" >

   

    <div class="content-inside">

      <div class="container my-5 px-0">

        <div class="form_container mx-auto px-4 py-4" style="width: max-content !important;">

          <div class="row">

            <div class="col text-center">

              <img src="libraries/img/logo.png" alt="" style="height:90px !important;">
          
            </div>
            
          </div>

          <form method="post" id="form_register">

          <div class="row mt-3">
            <div class="col text-center">
              <h5>Registration Form</h5>
            </div>
          </div>

          <div class="row mt-2">

            <div class="col">

            <input type="hidden" name="token" value="<?php echo $_SESSION['TOKEN']?>">

              <label class="mt-2"><i class="fas fa-at fa-fw pr-2"></i> Email</label>

              <input type="email" class="form-control" name="email" id="txt_email" required>

              <div class="text-right">
                <small>(This will be your username )</small>
              </div>
          
            </div>
            
          </div>

          <div class="row">

            <div class="col">

              <label class=""><i class="fas fa-mobile-alt fa-fw pr-2"></i> Mobile No</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important;">0</span>
                </div>
                <input type="text" name="mobile_no" id="mobile_no" pattern="\d*" maxlength="10" class="input-style form-control py-0" aria-label="#lbl_mobileno" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" aria-feedback="fb_mobile_no">
              </div>

              <div class="text-right">
                <small>( Must be a valid mobile number )</small>
              </div>
          
            </div>
            
          </div>

          <div class="row">

            <div class="col text-center mt-4" style="width: 30vw !important;" >

             <button class="btn">Sign Up</button>
                       
            </div>
            
          </div>

          </form>

          <div class="row">

            <div class="col text-center mt-1" >

              <small>By clicking Sign Up you agreed to</small>
              <br>

              <a href="terms_conditions.html" style="color:#E6E6E6 !important;"><u>TERMS & CONDITIONS</u> </a>
                      
            </div>

          </div>


        </div>
     
      </div>
   

    </div>
  
</div>

<?php include_once 'inc/footer.php'; ?>

