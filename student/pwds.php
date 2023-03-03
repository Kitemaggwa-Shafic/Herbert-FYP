<!DOCTYPE html>
<html lang="en">
<?php 
  require_once('inc/sessionzr.php');
  require_once('../config.php');
  require_once('inc/head.php'); 
  require_once('inc/my data.php');
?>

  <body>
  <?php include_once('inc/nav.php') ?>
    
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
      <div class="container">
        
      </div>
    </section>

    <section class="ftco-section ftco-agent">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-left ftco-animate">
            <p style = "font-size: 20px; font-weight: bold; color: blue;">Manage Password</p>
            <hr style = "margin: 2px 0;">
          </div>
        </div>
        
        <form action="#" method = "POST" style = "margin: 0;">
          <div class="row">
              <div class="col-md-5 ftco-animate">
                <input type="password" class="form-control" name = "new_p" placeholder="New password" required>
              </div>

              <div class="col-md-5 ftco-animate">
                <input type="password" class="form-control" name = "confirm_p" placeholder="Confirm password" required>
              </div>

              <div class="col-md-2 ftco-animate">
                <input type="submit" value="Save" name = "chng_pwd" class="btn py-3 px-5" style = "width: 100%; background-color: blue; border: none; color: #dddddd;">
              </div>
          </div>
        </form>
        <?php
          if (isset($_POST['chng_pwd'])) {
           $new_p = $conn->real_escape_string($_POST['new_p']);
           $confirm_p = $conn->real_escape_string($_POST['confirm_p']);

           if ($new_p === $confirm_p) {
            // Change pwd
            $salt = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36),0,14);
            $hash = $salt . md5($salt . $new_p);
            $conn->query("UPDATE students SET student_pwd = '$hash' WHERE account_id = '$my_id'");

            echo '<hr>';
            echo '<span style = "display: block; font-weight: bold; color: blue;"> Password changed. Logging out ... </span>';

            ?>
                <script type="text/javascript">
                    function Redirect(){
                        window.location = "logout.php";
                    }
                    setTimeout('Redirect()', 2000);
                </script>
            <?php
           } else {
            echo '<hr>';
            echo '<span style = "display: block; font-weight: bold; color: blue;"> Passwords do not match. Try Again </span>';
           }

          }
        ?>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include_once('inc/scripts.php'); ?> 
  </body>
</html>