<!DOCTYPE html>
<?php
session_start();
require_once('../config.php');
if (isset($_SESSION['s_go_uname']) && isset($_SESSION['s_go_pwd']) && isset($_SESSION['s_go_accountid'])) {
    ?>
        <script type="text/javascript">
            function Redirect(){
                window.location = "dashboard.php";
            }
            setTimeout('Redirect()', 1000);
        </script>
    <?php
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muteesa I Royal University</title>
    <style type="text/css">
    .modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.3); /* Black w/ opacity */
  font-family: arial;
  }
  .modal-body {padding: 5px;}
  .modal-content {
  background-color: blue;
  margin: 10% auto; /* 15% from the top and centered */
  padding: 5px;
  border: 1px solid white;
  width: 500px;
  max-width: 90%; /* Could be more or less, depending on screen size */
}
.close {
  color: #aaa;
  float: left;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px;
}
.tf {
  width: 97%;
  margin-bottom: 2px;
  padding: 5px 5px;
  font-size: 16px;
}
</style>
</head>
<body>
<div id="myModal" class="modal">
        <div class="modal-content">
          <div class="modal-header" style="text-align: center;">
          <img src="../images/emblem.jpg" alt="University Emblem" style = "width: 200px; height: 200px; object-fit: cover; border-radius: 50%; margin-top: 50px;">
            <p style="font-size: 20px; font-weight: bold; color: white;">Muteesa I Royal University - ORMS</p>
            <h4 style="color:#fff"><span>Students Login</span></h4>
          </div> 
          <hr>
             <p style = "color: blue; font-weight: bold; font-size: 12px;"></p> 
          <div class="modal-body"> 
            <?php
           
            echo '<form name="createform" method="post" action="">';
              echo ' <input class="tf" type="text" name="uname" placeholder="Registration Number" required="required">';
              echo ' <input class="tf" type="password" name="password" placeholder="Password">';
              echo ' <input id="createbtn" style="padding: 5px 10px; border: solid 1px; margin: 3px 0; border-radius: 2px; background-color: blue; color: #dddddd; font-size: 16px;" type="submit" name="submit" value="Login">';
            echo '</form>';
            if (isset($_POST['submit'])) {
                $a_regno = mysqli_real_escape_string($conn, $_POST["uname"]);
                $a_password = mysqli_real_escape_string($conn, ($_POST["password"]));
                
                $check_regno = $conn->query("SELECT * FROM students WHERE reg_no ='$a_regno'");
                $chk_usernm_num = mysqli_num_rows($check_regno);
                    if($chk_usernm_num == 0){
                    echo '<div style = "width: 100%; text-align: center; background-color: white; color: blue; padding: 5px 10px; margin-top: 10px;">Wrong registration number or password</div>';
                    } else {
                    $l_data = $check_regno->fetch_assoc();
                    
                    $hashed = $l_data['student_pwd'];

                    $dbSalt = substr($hashed,0,14);
                    $dbPass = substr($hashed,14);
                    $verified = md5($dbSalt . $a_password) == $dbPass; 

                        if ($verified === true) {
                          $_SESSION['s_go_uname'] = $a_regno;
                          $_SESSION['s_go_pwd'] = $hashed;
                          $_SESSION['s_go_accountid'] = $l_data['account_id'];
                          header('Location: dashboard.php');
                        } else {
                          echo '<div style = "width: 100%; text-align: center; background-color: white; color: blue; padding: 5px 10px; margin-top: 10px;">Wrong registration number or password</div>';
                       }
                    }
            }
           ?>
            <button style="width:30%; margin-left:50%; margin-bottom:-10%"><a href="../">Cancel</a></button>
         
          </div>
        </div> 
      </div> 
</body>
</html>