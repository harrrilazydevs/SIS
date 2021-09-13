<?php
    $page_title = 'Applicant Registration';
    include_once 'inc/header.php'; 

    
    
    (isset($_GET['id']))?$_SESSION['uid'] =$_GET['id']:header('location:500.html');

?>

<div class="content sis_content" >

    <input type="hidden" name="" value="<?php echo $_SESSION['uid']?>">

    <?php include_once 'inc/modals.php'; ?>
    <?php include_once 'modals.php'; ?>

    <div class="content-inside">

      <div class="container my-5 px-0">

        <div class="form_container mx-auto px-4 py-4"  >

          <div class="row">

            <div class="col text-center">

              <img src="libraries/img/logo.png" alt="" style="height:90px !important;">
          
            </div>
            
          </div>

          <div class="row mt-3">
            <div class="col text-center">
              <h5>Complete Registration</h5>
            </div>
          </div>


          <form method="post" id="form_complete_register">

          <input type="hidden" name="token" value="<?echo $_SESSION['token']?>">

       
          <div class="row mt-2">

            <div class="col-12 col-lg-4">

              <label class="mt-2">First Name</label>
              <input type="text" class="form-control" name="firstname" id="txt_fname" required>
          
            </div>
            <div class="col-12 col-lg-3">

                <label class="mt-2">Middle Name</label>
                <input type="text" class="form-control" name="middlename" id="txt_mname" required>

            </div>
            <div class="col-12 col-lg-3">

                <label class="mt-2">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="txt_lname" required>

            </div>
            <div class="col-12 col-lg-2">

                <label class="mt-2">Suffix</label>
                <input type="text" class="form-control" name="suffix" id="txt_suffix" required>

            </div>
            
          </div>

          <div class="row mt-2">

            <div class="col">

                <label class="">School</label>

                <select name="school_id" id="sel_school" class="form-control"></select>

            </div>
            
          </div>

          <div class="row mt-2">

            <div class="col">

                <label class="">Program</label>
                
                <select name="program_id" id="sel_program" class="form-control"></select>

            </div>
            
          </div>

          <div class="row">

            <div class="col text-center mt-4" style="width: 30vw !important;" >

             <button class="btn" type="submit">Proceed</button>
                       
            </div>
            
          </div>

          </form>

        </div>
     
      </div>
   

    </div>
  
</div>

<?php include_once 'inc/footer.php'; ?>

