<?php

  $USER_TYPE = 'ADMINISTRATOR';
  $page_title = 'Dashboard';

  include_once 'inc/header.php';
  include_once 'api/func/authenticate/authenticate.php';
  
  


  // var_dump(authenticated());
  // var_dump($_SESSION['sesh_id']);
  

 

  


?>


<div class="content">

    <?php include_once 'inc/navbar.php'; ?>

    <?php include_once 'inc/modals.php'; ?>


    <div class="content-inside">

      <div class="d-none page" id="page_dashboard">

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

      <div class="d-none page" id="page_cashincashout">

        <?php 

          $table_name = 'Cash In / Cash Out';
          include_once 'assets/table_view.php'; 
          
        ?>

      </div>

      <div class="d-none page" id="page_bets">

        <?php 

          $table_name = 'Bets';
          include_once 'assets/table_view.php'; 
          
        ?>

      </div>

      <div class="d-none page" id="page_winnings">

        <?php 

          $table_name = 'Winnings';
          include_once 'assets/table_view.php'; 
          
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
      <div class="page" id="page_admission">

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

