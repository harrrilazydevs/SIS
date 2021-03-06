<?php
  $page_title = 'Dashboard';

  include_once 'inc/header.php';
  include_once 'api/func/authenticate/authenticate.php';

  !isset($_SESSION) ? session_start() : '';

  $USER_TYPE = $_SESSION['usr'];

  $USER_TYPE === 'APPLICANT' ? ( !$_SESSION['authenticated'] ? header('location:login.php') : $_SESSION['upt'] === 0 ? header('location: ../../change_password.php') : '') :  !$_SESSION['authenticated'] ? header('location:login.php') :'';


  // check if nag log in
  ;


?>

<div class="content" >

  <?php include_once 'inc/navbar.php'; ?>

  <?php include_once 'inc/modals.php'; ?>

  <div class="content-inside">

    <div class="page" id="page_dashboard">

      <?php 

        if ($USER_TYPE == 'APPLICANT')
        {
          include_once 'assets/applicant/dashboard.php'; 
        }

        if ($USER_TYPE == 'REGISTRAR')
        {
          include_once 'assets/registrar/admission.php'; 
        }

        if ($USER_TYPE == 'DEVELOPER')
        {
          include_once 'assets/administrator/dashboard.php'; 
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

    <!-- REQUIREMENTS -->
    <div class="d-none page" id="page_requirements">

      <?php 

        if ($USER_TYPE == 'ADMINISTRATOR' || $USER_TYPE == 'DEVELOPER')
        {
          include_once 'assets/administrator/requirements.php'; 
        }
        
      ?>

    </div>

    <!-- REQUIREMENTS SET UP -->
    <div class="d-none page" id="page_requirements_setup">

      <?php 

        if ($USER_TYPE == 'ADMINISTRATOR' || $USER_TYPE == 'DEVELOPER')
        {
          include_once 'assets/administrator/requirements-setup.php'; 
        }
        
      ?>

    </div>

    <!-- MONITORING -->
    <div class="d-none page" id="page_monitoring">

      <?php 

        if ($USER_TYPE == 'ADMINISTRATOR' || $USER_TYPE == 'DEVELOPER')
        {
          include_once 'assets/administrator/monitoring.php'; 
        }
        
      ?>

    </div>

    <div class="d-none page" id="page_building_requirements">

      <?php 

        if ($USER_TYPE == 'ADMINISTRATOR' || $USER_TYPE == 'DEVELOPER')
        {
          include_once 'assets/administrator/building_maintenance.php'; 
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

if ($USER_TYPE == 'ADMINISTRATOR' || $USER_TYPE == 'DEVELOPER')
{
  include_once 'assets/administrator/sidebar.php';  
}

?>


<?php 

include_once 'inc/footer.php';  

if ($USER_TYPE == 'APPLICANT')
{
  echo '<script src="libraries/js/dashboard/applicant/function.js"></script>';  
}

if ($USER_TYPE == 'DEVELOPER')
{
  echo '<script src="libraries/js/dashboard/administrator/function.js"></script>';  
}

?>






<footer class="footer bg-secondary text-light text-center py-2" style="font-size: 10pt !Important;">
    <p>
        2021 ?? All Rights Reserved by <a href="" class="pt-5 font-weight-bold" style="text-decoration: none; color: #3AC7EC !important;">Lazy Developers PH</a>
    </p>
</footer>

