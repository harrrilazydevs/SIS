<?php
session_start();

function authenticated(){
    if (session_status() == PHP_SESSION_ACTIVE) { return session_id();}

    


    if(isset($_SESSION['authenticated'])){
        if(!$_SESSION['authenticated'])
        {
            echo '<script>location.href="login.php"</script>';
        }
      }
      else
      { 
        echo '<script>location.href="login.php"</script>';
      }
}
