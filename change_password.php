<?php
    $page_title = 'Applicant Login';
    include_once 'inc/header.php'; 
    include_once 'api/func/authenticate/authenticate.php';
    include_once 'api/func/authenticate/generate.php';

    regenerate_token();

    // if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){
    //   header('location:index.php');
    // }

?>

<div class="content sis_content" >

  <div class="content-inside">

    <div class="container my-5">

      <div class="form_container mx-auto px-4 py-4" style="width: max-content !important;">

        <div class="row">

          <div class="col text-center">

            <img src="libraries/img/logo.png" alt="" style="height:90px !important;">
        
          </div>
          
        </div>

        <form method="post" id="form_change_password">
          
        <div class="row mt-3">
          <div class="col text-center ">
            <h5> Change Password</h5>
          </div>
        </div>

        <div class="row mt-2">

          <div class="col">

            <input type="hidden" class="form-control" id="txt_token" value="<?php echo $_SESSION['TOKEN'];?>">

            <input type="hidden" name="id" id="txt_id" class="form-control" value="<?php echo $_SESSION['uid'];?>">

            <label class="mt-2"></i> Password</label> 
            <input type="text" name="password" id="txt_password" maxlength="32" class="input-style form-control py-0" aria-label="#lbl_mobileno" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" aria-feedback="fb_mobile_no">

        
          </div>
          
        </div>

        <div class="row mt-1">

          <div class="col">

            <label class="mt-2">Confirm Password</label>
            <input type="text" id="txt_password2" maxlength="32" class="input-style form-control py-0" aria-label="#lbl_mobileno" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" aria-feedback="fb_mobile_no">

          </div>
          
        </div>

        <div class="row">

          <div class="col text-center mt-4" style="width: 30vw;">

            <button class="btn" type="submit">Proceed</button>
                      
          </div>
          
        </div>

        </form>

      </div>
    
    </div>
  

  </div>
  
</div>

<?php include_once 'inc/modals.php'; ?>

<?php include_once 'inc/footer.php'; ?>

<script src="libraries/js/dashboard/applicant/change_password_function.js"></script>

<footer class="footer bg-main-color text-light text-center py-2" style="font-size: 10pt !Important;">
    <p>
        2021 © All Rights Reserved by <a href="" class="pt-5 font-weight-bold" style="text-decoration: none; color: #3AC7EC !important;">Lazy Developers PH</a>
    </p>
</footer>




