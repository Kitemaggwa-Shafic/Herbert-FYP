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
            <p style = "font-size: 20px; font-weight: bold; color: blue;">ORMS Library</p>
            <hr style = "margin: 2px 0;">
          </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form action="#" method = "GET" style = "margin: 0;">
                    <table width ="100%">
                        <tr>
                            <td style = "width: 80%;">
                                <div class="form-group" style = "margin: 0;">
                                    <input type="text" class="form-control" name = "searchquery" placeholder="Search library" style = "border-bottom: solid blue 5px;" required>
                                </div>
                            </td>
                            <td style = "width: 20%;">
                                <div class="form-group" style = "margin: 0;">
                                    <input type="submit" value="Search" name = "search_q" class="btn py-3 px-5" style = "width: 100%; background-color: blue; border: none; color: #dddddd;">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <hr>
        	</div>
        	<?php
            if (isset($_GET['search_q'])) {
              // Run search query here
              $searchq = $conn->real_escape_string($_GET['searchquery']);
              $search = preg_replace("#[^0-9a-z]#i","",$searchq);
              $fetch_all = $conn->query("SELECT * FROM library WHERE filename LIKE '%$search%' OR filename = '$searchq' ORDER BY dt DESC");
              while($all_lib = $fetch_all->fetch_assoc()):
                echo '<div class="col-md-3 ftco-animate">';
                  echo '<div class="agent">';
                    echo '<div class="img">';
                      echo '<img src="../images/bg4.png" class="img-fluid" alt="Colorlib Template">';
                    echo '</div>';
                    echo '<div class="desc">';
                      echo '<div><a href="../research library/'.$all_lib['filename'].'" style = "color: #dddddd; font-weight: bold; font-size: 12px;">'.substr($all_lib['filename'], 13).'</a></div>';
                      echo '<hr style = "margin: 3px 0;">';
  
                        echo '<div class = "row">';
                          echo '<div class="col-md-12" style = "font-size: 11px;">';
                            echo gmdate("D. j M, Y", $all_lib['dt']);
                          echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    
                  echo '</div>';
                echo '</div>';
              endwhile;
            } else {
              $fetch_all = $conn->query("SELECT * FROM library ORDER BY dt DESC");
              while($all_lib = $fetch_all->fetch_assoc()):
                echo '<div class="col-md-3 ftco-animate">';
                  echo '<div class="agent">';
                    echo '<div class="img">';
                      echo '<img src="../images/bg4.png" class="img-fluid" alt="Colorlib Template">';
                    echo '</div>';
                    echo '<div class="desc">';
                      echo '<div><a href="../research library/'.$all_lib['filename'].'" style = "color: #dddddd; font-weight: bold; font-size: 12px;">'.substr($all_lib['filename'], 13).'</a></div>';
                      echo '<hr style = "margin: 3px 0;">';
  
                        echo '<div class = "row">';
                          echo '<div class="col-md-12" style = "font-size: 11px;">';
                            echo gmdate("D. j M, Y", $all_lib['dt']);
                          echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    
                  echo '</div>';
                echo '</div>';
              endwhile;
            }
			    ?>
        </div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include_once('inc/scripts.php'); ?> 
  </body>
</html>