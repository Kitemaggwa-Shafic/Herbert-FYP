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
            <p style = "font-size: 20px; font-weight: bold; color: blue;">Your Research, Projects and Documentation</p>
            <hr style = "margin: 2px 0;">
          </div>
        </div> 
        <div class="row">
        	<?php
				$fetch_all = $conn->query("SELECT * FROM projects WHERE studentID = '$my_id' AND status = '1' ORDER BY dt DESC");
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


<!-- New Addition changes for Upload image to replace footer-->
<footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="ftco-footer-widget mb-4">
            <p class="ftco-heading-2" style = "font-weight: bold; font-size: 16px;">Create Research Project Repository</p>
            <hr>
                <form method = "post" action="footer2.php" enctype = "multipart/form-data" style = "margin: 0;">
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                            <input type="text" class="form-control" name = "reposit_title" placeholder="Repository | Project Title">
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                            <textarea class="form-control" name = "reposit_description" placeholder="Repository | Project Description"></textarea>
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                            <input type="text" class="form-control" name = "reposit_date" placeholder="Repository | Date">
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                    <div class="col-md-12 ftco-animate">
                        <select class="form-control" style="width:100%" name = "reg_no">
                                <option title = "Location for this file">Select Student Number</option>
                                <?php
                                $my_repos = $conn->query("SELECT * FROM students ");
                                while($my_repos_r = $my_repos->fetch_assoc()):
                                    echo '<option value = "'.$my_repos_r['reg_no'].'">'.$my_repos_r['reg_no'].'</option>';
                                endwhile;
                                ?>
                            </select>
                            </div>
                            <hr style = "margin: 3px 0;">   
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                        <input type="file" name = "file" style = "padding: 0;">
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                      <div class="form-group" style = "margin: 0;">
                        <!-- <input type="submit" value="Upload File" name = "new_repo_file" class="btn py-3 px-5" style = "color: blue; border: none; background-color: #dddddd; font-weight: bold; margin: 0 15px;"> -->
                      </div>
                    <hr style = "margin: 3px 0;">

                    <div class="form-group" style = "margin: 0;">
                        <input type="submit" value="Create Repository" name = "new_repo" class="btn py-3 px-5" style = "color: blue; border: none; background-color: #dddddd; font-weight: bold; margin: 0 15px;">
                    </div>
                </form>
                      <?php
                        // if(isset($_POST['new_repo'])){
                        
                        // //   $new_title = $conn->real_escape_string($_POST['reposit_title']);
                        // //   $new_desc = $conn->real_escape_string($_POST['reposit_description']);
                        // //   $respo_date = $conn->real_escape_string($_POST['reposit_date']);
                        // //   $reg_no = $conn->real_escape_string($_POST['reg_no']);

                        // // $d =date('Y-m-d');

                        //   // $filename = rand(). $_FILES[new_repo_file][name];
                        //   //   move_uploaded_file($_FILES[new_repo_file][tmp_name], "upload/".$filename);
                            
                        //     $query =mysql_query("INSERT INTO ebook VALUES (NULL, '$tt', '$filename', '$sec', '$d' )");
                        //     if(!$query){
                        //     echo failed.mysql_error();
                        //     }
                       // }
                      ?>
                <?php
                if (isset($_POST['new_repo'])) {
                    $new_title = $conn->real_escape_string($_POST['reposit_title']);
                    $new_desc = $conn->real_escape_string($_POST['reposit_description']);
                    $respo_date = $conn->real_escape_string($_POST['reposit_date']);
                    $reg_no = $conn->real_escape_string($_POST['reg_no']);

                    $filename = rand(). $_FILES["file"]["name"];
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$filename);
                    
                    function gen_new_id($length_of_string){
                        $str_result = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        return substr(str_shuffle($str_result), 0, $length_of_string);
                    }
                    $new_repo = gen_new_id(30);
                    
                    $dt = date('d');
                    $mon = date('m');
                    $yr = date('Y');	
                    $timestamps = date('U');
                    
                    $newrepositoryID = $conn->real_escape_string($new_repo);
                    $tmp = $newrepositoryID;
                    $inc = 1;
                    $valid = false;
                    
                    mkdir('Repositories/'.$newrepositoryID);

                    function xcopy($source, $dest, $permissions = 0755) {
                        $sourceHash = hashDirectory($source);
                        // Check for symlinks
                        if (is_link($source)) {
                            return symlink(readlink($source), $dest);
                        }
                    
                        // Simple copy for a file
                        if (is_file($source)) {
                            return copy($source, $dest);
                        }
                    
                        // Make destination directory
                        if (!is_dir($dest)) {
                            mkdir($dest, $permissions);
                        }
                    
                        // Loop through the folder
                        $dir = dir($source);
                        while (false !== $entry = $dir->read()) {
                            // Skip pointers
                            if ($entry == '.' || $entry == '..') {
                                continue;
                            }
                    
                            // Deep copy directories
                            if($sourceHash != hashDirectory($source."/".$entry)){
                                 xcopy("$source/$entry", "$dest/$entry", $permissions);
                            }
                        }
                    
                        // Clean up
                        $dir->close();
                        return true;
                    }
                    
                    // In case of coping a directory inside itself, there is a need to hash check the directory otherwise and infinite loop of coping is generated
                    
                    function hashDirectory($directory){
                        if (! is_dir($directory)){ return false; }
                    
                        $files = array();
                        $dir = dir($directory);
                    
                        while (false !== ($file = $dir->read())){
                            if ($file != '.' and $file != '..') {
                                if (is_dir($directory . '/' . $file)) { $files[] = hashDirectory($directory . '/' . $file); }
                                else { $files[] = md5_file($directory . '/' . $file); }
                            }
                        }
                    
                        $dir->close();
                    
                        return md5(implode('', $files));
                    }
                    
                    $copyfolder = xcopy('../Indexer/', 'Repositories/'. $newrepositoryID .'/');
                   
                    $repository_id_handle2 = fopen('Repositories/'. $newrepositoryID .'/' .$filename , 'w');
                        $repo_id2 = $newrepositoryID;
                        fwrite($repository_id_handle2, $repo_id2);
                        fclose($repository_id_handle2);
                    
                        $repository_id_handle = fopen('Repositories/'. $newrepositoryID .'/.Repository ID.txt', 'w');
                        $repo_id = $newrepositoryID;
                        fwrite($repository_id_handle, $repo_id);
                        fclose($repository_id_handle);

                        $student_id_handle = fopen('Repositories/'. $newrepositoryID .'/.Student ID.txt', 'w');
                        $stud_id = $my_id; 
                        fwrite($student_id_handle, $stud_id);
                        fclose($student_id_handle);

                   $conn->query("INSERT INTO projects(dt, title, repositoryID, repositoryNotes, studentID,respo_date,reg_no,project,research_approved) VALUES('$timestamps','$new_title','$newrepositoryID','$new_desc','$my_id','$respo_date','$reg_no','$filename','FALSE')");
                }
                ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include_once('inc/scripts.php'); ?> 
  </body>
</html>