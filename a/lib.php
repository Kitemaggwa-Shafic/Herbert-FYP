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
							<form action="add file.php" class="search-property-1" method="POST" enctype = "multipart/form-data">
		        		<div class="row">
		        			<div class="col-lg-8 align-items-end">
		        				<div class="form-group">
		        					<label for="Student name">Add file to library</label>
				                <input type="file" class="form-control" name="documentadd" required>
			              </div>
		        			</div>
		        			
		        			<div class="col-lg-4 align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Add file to ORMS Library" class="form-control btn btn-primary" name="addFile">
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


    <section>
      <div class="container">
        <div class="row pt-md-5">
          <div class="col-md-12 heading-section text-left ftco-animate">
              <p style = "font-size: 20px; font-weight: bold; color: blue;">ORMS Library</p>
              <hr style = "margin: 10px 0;">
          </div>
          <?php
            $fetch_lib = $conn->query("SELECT * FROM library ORDER BY dt DESC");
            while($all_lib = $fetch_lib->fetch_assoc()):
              echo '<div class="col-md-3 ftco-animate">';
                echo '<div class="agent">';
                  echo '<div class="img">';
                    echo '<img src="../images/bg4.png" class="img-fluid" alt="Colorlib Template">';
                  echo '</div>';
                  echo '<div class="desc">';
                    echo '<div><a href="../research library/'.$all_lib['filename'].'" style = "color: #dddddd; font-weight: bold; font-size: 12px;">'.substr($all_lib['filename'], 13).'</a></div>';
                    echo '<hr style = "margin: 3px 0;">';

                      echo '<div class = "row">';
                        echo '<div class="col-md-8" style = "font-size: 11px;">';
                          echo gmdate("D. j M, Y", $all_lib['dt']);
                        echo '</div>';
                      
                        echo '<div class="col-md-4" style = "font-size: 11px;">';
                          echo '<a href = "del.php?d='.$all_lib['filename'].'"> Delete </a>';
                        echo '</div>';
                      echo '</div>';
                        
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
