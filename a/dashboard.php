<!DOCTYPE html>
<?php
require_once('inc/sessionzr.php');
include '../config.php';
?>
<html lang="en">
  <head>
    <title>Admin: ORMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    
	  <?php include_once('inc/nav.php'); ?>

    <!-- END nav -->
    
    <section class="" style="background: blue;" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="" style = "height: 100px;">
        </div>
      </div>
    </section>

    <section class="" style="" data-stellar-background-ratio="0.5">
      <div class="container">
      <hr>
      <h1 style = "text-align: center; background-color: ; color: blue; font-size: 30px; font-weight: bold;">MUTEESA I ROYAL UNIVERSITY - ORMS</h1>
        <div class="" style = "height: 100px;">
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate p-4" style = "border: solid white 4px;">
                <hr>
							<form action="addstudents.php" class="search-property-1" method="POST">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="Student name">Student Name</label>
		          				<div class="form-field" style = "border: solid #dddddd 1px;">
				                <input type="text" class="form-control" placeholder="Name" name="stdntname" required>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="Student	registrationNumber">Student Registration Number</label>
		          				<div class="form-field" style = "border: solid #dddddd 1px;">
				                <input type="text" class="form-control" placeholder="Reg. Number" name="regno" required>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Add student to ORMS" class="form-control btn btn-primary" name="addstudent">
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>


  
    <section class="ftco-counter img" id="section-counter">
    	<div class="container">
    		<div class="row pt-md-5">

          <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <?php
                    $count_students = mysqli_num_rows($conn->query("SELECT * FROM students"));
                    echo '<strong class="number">'.$count_students.'</strong>';
                ?>
                <span>Student <br>Portals</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <?php
                    $count_projss = mysqli_num_rows($conn->query("SELECT * FROM projects"));
                    echo '<strong class="number">'.$count_projss.'</strong>';
                ?>
                <span>Total <br>Repositories</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
              <div class="text text-border d-flex align-items-center">
                <?php
                    $count_lib = mysqli_num_rows($conn->query("SELECT * FROM library"));
                    echo '<strong class="number">'.$count_lib.'</strong>';
                ?>
                <span>Library <br>Content files</span>
              </div>
            </div>
          </div>
          
        </div>
    	</div>
    </section>

    <section>
      <div class="container">
        <div class="row pt-md-5">
          <div class="col-md-12 heading-section text-left ftco-animate">
              <p style = "font-size: 20px; font-weight: bold; color: blue;">Research, Projects and Documentation</p>
              <hr style = "margin: 10px 0;">
          </div>
          <?php
            $fetch_all = $conn->query("SELECT * FROM projects WHERE status = '1' ORDER BY dt DESC");
            while($all_r = $fetch_all->fetch_assoc()):
              echo '<div class="col-md-3 ftco-animate">';
                echo '<div class="agent">';
                  echo '<div class="img">';
                    echo '<img src="../images/bg1.jpg" class="img-fluid" alt="Colorlib Template">';
                  echo '</div>';
                  echo '<div class="desc">';
                    echo '<div><a href="../student/Repositories/'.$all_r['repositoryID'].'/.index.php" style = "color: #dddddd; font-weight: bold;">'.$all_r['title'].'</a></div>';
                    echo '<hr style = "margin: 3px 0;">';
                      echo '<p class="h-info"><span class="details">'.gmdate("D. j M, Y", $all_r['dt']).'</span></p>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            endwhile;
          ?>
        </div>
      </div>
    </section>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>
