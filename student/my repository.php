<!DOCTYPE html>
<html lang="en">
<?php 
  require_once('inc/sessionzr.php');
  require_once('../config.php');
  require_once('inc/head.php'); 
  require_once('inc/my data.php');
  
?>
  <body>
  <?php require_once('inc/nav.php'); ?>
    
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
      <div class="container">
        
      </div>
    </section>

    <section class="ftco-section ftco-agent">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-left ftco-animate">
            <p style = "font-size: 20px; font-weight: bold; color: blue;">Your Approved Research, Projects and Documentation</p>
            <hr style = "margin: 2px 0;">
          </div>
        </div> 
        <div class="row">
        	<?php
				$fetch_all = $conn->query("SELECT * FROM projects 
        WHERE studentID = '$my_id' AND research_approved ='TRUE' AND status = '1' ORDER BY dt DESC");
				while($all_r = $fetch_all->fetch_assoc()):
				  echo '<div class="col-md-3 ftco-animate">';
					echo '<div class="agent">';
					  echo '<div class="img">';
						echo '<img src="../images/bg1.jpg" class="img-fluid" alt="Colorlib Template">';
					  echo '</div>';
					  echo '<div class="desc">';
						echo '<div><a href="Repositories/'.$all_r['repositoryID'].'/.index.php" style = "color: #dddddd; font-weight: bold;">'.$all_r['title'].'</a></div>';
						echo '<hr style = "margin: 3px 0;">';
						  // echo '<p class="h-info"><span class="details">'.gmdate("D. j M, Y", $all_r['dt']).'</span></p>';
						  echo '<p class="h-info"><span class="details">'.$all_r['respo_date'].'</span></p>';
					  echo '</div>';
					echo '</div>';
				  echo '</div>';
				endwhile;
			?>
        </div>
    	</div>
    </section>
	<?php //include_once('inc/footer.php'); ?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include_once('inc/scripts.php'); ?> 
  </body>
</html>