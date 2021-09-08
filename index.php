<?php
    $page_title = 'Dashboard';
    include_once 'inc/header.php'; 
?>

<div class="content">

    <?php include_once 'inc/navbar.php'; ?>

    <?php include_once 'inc/modals.php'; ?>

    <div class="content-inside">

    <div class="d-none page" id="page_login">

      <?php include_once 'assets/login.php'; ?>

    </div>


      <div class="page" id="page_dashboard">

        <?php 
        include_once 'assets/dashboard.php'; ?>

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



    </div>
  
</div>

<?php include_once 'inc/footer.php'; ?>


<footer class="footer bg-secondary text-light text-center py-2" style="font-size: 10pt !Important;">
    <p>
        2021 © All Rights Reserved by <a href="" class="pt-5 font-weight-bold" style="text-decoration: none; color: #3AC7EC !important;">Lazy Developers PH</a>
    </p>
</footer>

