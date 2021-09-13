<?php
    $page_title = 'Applicant Login';
    include_once 'inc/header.php'; 
    include_once 'api/func/authenticate/authenticate.php';
    include_once 'api/func/authenticate/generate.php';

    regenerate_token();

    if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){
      header('location:index.php');
    }

?>

<?php include_once 'modals.php'; ?>
<div class="content sis_content" >

  <div class="content-inside">

    <div class="container my-5">

      <div class="form_container mx-auto px-4 py-4" style="width: max-content !important;">

        <div class="row">

          <div class="col text-center">

            <img src="libraries/img/logo.png" alt="" style="height:90px !important;">
        
          </div>
          
        </div>


        <!-- CHANGE THGE DATA-TARGET = id ng modal  -->
        <button class="btn" data-target="#m_l_register_success" data-toggle="modal">TEST</button>
   

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




