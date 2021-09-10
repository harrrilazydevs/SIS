<?php

  $USER_TYPE = 'ADMINISTRATOR';
  $page_title = 'Dashboard';

  include_once 'inc/header.php';
  include_once 'api/func/authenticate/authenticate.php';

  if(!$_SESSION['authenticated']){
    header('location:login.php');
  }

?>


<div class="content" >

    <?php include_once 'inc/navbar.php'; ?>

    <?php include_once 'inc/modals.php'; ?>


    <div class="content-inside">

      <div class="d-none page" id="page_dashboard">

      <button class="btn-primary"> test</button>

        <?php 

          if ($USER_TYPE == 'APPLICANT')
          {
            include_once 'assets/applicant/dashboard.php'; 
          }

          if ($USER_TYPE == 'REGISTRAR')
          {
            include_once 'assets/registrar/dashboard.php'; 
          }
            
        ?>

      </div>

    

      <!-- REGISTRAR -->
      <div class="d-none page" id="page_admission">

        <?php 

          if ($USER_TYPE == 'REGISTRAR')
          {
            include_once 'assets/registrar/admission.php'; 
          }

         
        ?>

      </div>

      <!-- ADMINISTRATOR -->
      <div class="d-none page" id="page_admission">

        <?php 

          if ($USER_TYPE == 'ADMINISTRATOR')
          {
            include_once 'assets/administrator/enrollee_list.php'; 
          }

         
        ?>

      </div>






    </div>
  
</div>


<?php


if ($USER_TYPE == 'APPLICANT')
{
  include_once 'assets/applicant/sidebar.php';  
}

if ($USER_TYPE == 'REGISTRAR')
{
  include_once 'assets/registrar/sidebar.php';  
}

if ($USER_TYPE == 'ADMINISTRATOR')
{
  include_once 'assets/administrator/sidebar.php';  
}


?>


<?php include_once 'inc/footer.php'; ?>




<footer class="footer bg-secondary text-light text-center py-2" style="font-size: 10pt !Important;">
    <p>
        2021 © All Rights Reserved by <a href="" class="pt-5 font-weight-bold" style="text-decoration: none; color: #3AC7EC !important;">Lazy Developers PH</a>
    </p>
</footer>

