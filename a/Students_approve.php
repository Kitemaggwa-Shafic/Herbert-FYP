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
                       
							<form action="delete student.php" class="search-property-1" method="POST">
		        		<div class="row">
		        			<div class="col-lg-8 align-items-end">
		        				<div class="form-group">
		        					<label for="Student name">Delete a student</label>
				                <select name="df" id="" class="form-control" style = "border: solid white 2px; color: blue;">
                                    <?php
                                     $fetch_student = $conn->query("SELECT * FROM students ORDER BY student_name ASC");
                                     echo '<option vlaue = "">Select student</option>';
                                     while($all_students = $fetch_student->fetch_assoc()):
                                       echo '<option value = "'.$all_students['account_id'].'" style = "color: blue;">'.$all_students['student_name'].' ['.$all_students['reg_no'].']</option>';
                                     endwhile;
                                    ?>
                        </select>
			              </div>
		        			</div>
		        			
		        			<div class="col-lg-4 align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Delete from Registry" class="form-control btn btn-primary" name="addFile">
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
              <p style = "font-size: 20px; font-weight: bold; color: blue;">Students Research Sent In for Approval</p>
              <hr style = "margin: 10px 0;">
          </div>
          
      
      <table class="table" border="1" cellpadding="2" cellspacing="1" width="0%" align="center">
			  <tr bgcolor="#000066" style="color:#FFFFFF">
          <th >S/No.</th>
          <th>Full Name</th>
          <th>Resgistration Number</th> 
          <th>Date Registered</th>
          <th>Student Research</th>
          <th colspan="2">Action</th> 
        </tr>
      
        <tr>
			<?php 
      $sno =0;
      
          $fetch_student = $conn->query("SELECT * FROM students 
          JOIN projects 
          ON students.reg_no = projects.reg_no");
            while($all_students = $fetch_student->fetch_assoc()){
           
        ?>
        <td><?php echo $all_students['recordid']; ?></td>  
        <td><?php echo $all_students['student_name']; ?></td>
        <td><?php echo $all_students['reg_no']; ?></td> 
        <!-- <td><?php echo gmdate("D. j M, Y", $all_students['dt']); ?></td> -->
        <td><?php echo $all_students['respo_date']; ?></td>
        <td><?php echo $all_students['title']; ?></td>
        <td><a style="color:#000fff" href="approve_research.php/<?php echo $all_students['repositoryID']; ?>" >
          <img src="../images/warn.png"  width="45" height="35"/> Approve This Research</a>
        </td>

        
          <td><a href="../student/Repositories/
          <?php 
           
           ?>">
              Click to Download</a></td>
			

          <td>
          echo '<tr class="'.$class.'">';
			echo '<td><a href="./'.$namehref.'"'.$favicon.' class="name">'.$name.'</a></td>';
			echo '<td><a href="./'.$namehref.'">'.$extn.'</a></td>';
			echo '<td sorttable_customkey="'.$sizekey.'"><a href="./'.$namehref.'">'.$size.'</a></td>';
			echo '<td sorttable_customkey="'.$timekey.'"><a href="./'.$namehref.'">'.$modtime.'</a></td>';
			echo '<td sorttable_customkey="'.$timekey.'">';
				if ($student_ID === $this_accID) {
					echo '<a href=".del.php?f='.$namehref.'" style = "background-color: #f1a804;">Delete</a>';
				} else {
					echo '<a href="./'.$namehref.'">...</a>';
				}
			echo '</td>';
		echo '</tr>';
           

             
                ?> -->
          </td>
      </tr>
      
      <?php } ?>
      </table>
      
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
