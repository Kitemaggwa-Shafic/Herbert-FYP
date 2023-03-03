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
                    <form action="#.php" method = "GET" >
                                <div class="form-group" >
                                     <h4 style="color:#fff; margin-left:25%">Your Search Approved Students Results Displaying</h4>
                                </div>
                    </form>
           
                    </div>
				</div>
	    	</div>
	    </div>
    </section>

    <div class="row">
            <div class="col-md-12 ftco-animate">
               
                <hr>
        	</div>
        <table class="table" border="1" cellpadding="2" cellspacing="1"  align="center">
            <tr bgcolor="#000066" style="color:#FFFFFF">
                <th>S/No.</th>
                <th>Full Name</th>
                <th>Resgistration Number</th> 
                <th>Date Registered</th>
                <th>Student Research</th>
                <th colspan="2">Comments</th> 
            </tr>
        <tr>
        	<?php
            if (isset($_GET['search_q'])) {
              // Run search query here
              $searchq = $conn->real_escape_string($_GET['searchquery']);
              $search = preg_replace("#[^0-9a-z]#i","",$searchq);
              $fetch_all = $conn->query("SELECT * FROM students 
              JOIN projects 
              ON students.reg_no = projects.reg_no 
              WHERE research_approved = 'TRUE'AND 
              student_name LIKE '%$search%'    ");
              while($all_students = $fetch_all->fetch_assoc()){
            ?>
                <td><?php echo $all_students['recordid']; ?></td>  
                <td><?php echo $all_students['student_name']; ?></td>
                <td><?php echo $all_students['reg_no']; ?></td> 
                <td><?php echo $all_students['respo_date']; ?></td>
                <td><?php echo $all_students['title']; ?></td>
                <td><img src="../images/yes.png"  width="45" height="45"/><a style="color:#000fff">Yes, Research approved</a></td>
              </tr>
              
              <?php } } 
             
                ?>
              </table>
        
        </div>


   

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
