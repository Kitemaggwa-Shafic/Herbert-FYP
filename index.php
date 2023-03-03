<!DOCTYPE html>
<?php require_once('config.php'); ?>
<html lang="en">
  <head>
    <title>Muteesa I Royal University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <section class="hero-wrap" style="background-image: url('images/cover.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center">
          <div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text">
	            <h1 class="mb-4">Muteesa I Royal University</h1>
	            <p style="font-size: 18px;">Centralised research directory</p>
	            <p><a href="student" class="btn btn-primary py-3 px-4">Get Started Student</a></p>
              <p><a href="a/" class="btn btn-primary py-3 px-4">Admin Login Panel</a></p>
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
                    echo '<strong class="number" data-number="'.$count_students.'">0</strong>';
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
                    echo '<strong class="number" data-number="'.$count_projss.'">0</strong>';
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
                    echo '<strong class="number" data-number="'.$count_lib.'">0</strong>';
                ?>
                <span>Library <br>Content files</span>
              </div>
            </div>
          </div>
          
        </div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>