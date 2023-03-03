<footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="ftco-footer-widget mb-4">
            <p class="ftco-heading-2" style = "font-weight: bold; font-size: 16px;">Create Research Project Repository</p>
            <hr>
                <form method = "post" action="#" style = "margin: 0;">
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
                    <div class="form-group" style = "margin: 0;">
                        <input type="submit" value="Create Repository" name = "new_repo" class="btn py-3 px-5" style = "color: blue; border: none; background-color: #dddddd; font-weight: bold; margin: 0 15px;">
                    </div>
                </form>
                <?php
                if (isset($_POST['new_repo'])) {
                    $new_title = $conn->real_escape_string($_POST['reposit_title']);
                    $new_desc = $conn->real_escape_string($_POST['reposit_description']);
                    $respo_date = $conn->real_escape_string($_POST['reposit_date']);
                    $reg_no = $conn->real_escape_string($_POST['reg_no']);

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
                    
                    // lookup if the id is in use
                    $qid = $conn->query("SELECT repositoryID from projects where repositoryID = '$newrepositoryID'");
                    if(mysqli_num_rows($qid) == 0) $valid = true;
                    
                    // if it is in use, keep looking up until a valid id is found 
                    while(!$valid) {
                        $newrepositoryID = $tmp . $inc; // append number
                        $qid = $conn->query("SELECT repositoryID from projects where repositoryID = '$newrepositoryID'");
                        if(mysqli_num_rows($qid) == 0) $valid = true;
                        $inc++;
                    }

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
                    
                    
                        $repository_id_handle = fopen('Repositories/'. $newrepositoryID .'/.Repository ID.txt', 'w');
                        $repo_id = $newrepositoryID;
                        fwrite($repository_id_handle, $repo_id);
                        fclose($repository_id_handle);

                        $student_id_handle = fopen('Repositories/'. $newrepositoryID .'/.Student ID.txt', 'w');
                        $stud_id = $my_id; 
                        fwrite($student_id_handle, $stud_id);
                        fclose($student_id_handle);

                    $conn->query("INSERT INTO projects(dt, title, repositoryID, repositoryNotes, studentID,respo_date,reg_no) VALUES('$timestamps','$new_title','$newrepositoryID','$new_desc','$my_id','$respo_date','$reg_no')");
                }
                ?>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
              <p class="ftco-heading-2" style = "font-weight: bold; font-size: 16px;">Add file to repository</p>
              <div class="block-23 mb-3">
              <hr>
              <form method = "post" action="#" enctype = "multipart/form-data" style = "margin: 0;">
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                            <select class="form-control" name = "to_repository">
                                <option title = "Location for this file">Select a repository</option>
                                <?php
                                $my_repos = $conn->query("SELECT * FROM projects WHERE studentID = '$my_id' AND status = '1'");
                                while($my_repos_r = $my_repos->fetch_assoc()):
                                    echo '<option value = "'.$my_repos_r['repositoryID'].'">'.$my_repos_r['title'].'</option>';
                                endwhile;
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                    <div class="col-md-12 ftco-animate">
                        <div class="form-group" style = "margin: 0;">
                        <input type="file" name = "reposit_file" style = "padding: 0;">
                        </div>
                    </div>
                    <hr style = "margin: 3px 0;">
                    <span style = "display: block; font-weight: bold; font-size: 14px; margin: 0 15px;">NOTE: This file name might change</span>
                    <hr style = "margin: 3px 0;">
                    <div class="form-group" style = "margin: 0;">
                        <input type="submit" value="Upload File" name = "new_repo_file" class="btn py-3 px-5" style = "color: blue; border: none; background-color: #dddddd; font-weight: bold; margin: 0 15px;">
                    </div>
                </form>
                <?php
                if (isset($_POST['new_repo_file'])) {
                    if ($_FILES["reposit_file"]["name"] === "") {
                        echo '<span style = "display: block; font-weight: bold; font-size: 14px; margin: 0 15px;">No attachment found</span>';
                    } else {
                        $to_reposit = $conn->real_escape_string($_POST['to_repository']);
                        $target_dir = 'Repositories/'. $to_reposit .'/';
                        $target_file = $target_dir . basename($_FILES["reposit_file"]["name"]);
                        $uploadOk = 1;
                        $FileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        // Allow certain file formats
                        if ($FileType != "pdf" && $FileType != "jpeg" && $FileType != "jpg" && $FileType != "png" && $FileType != "php" && $FileType != "html" && $FileType != "js" && $FileType != "css" && $FileType != "zip" && $FileType != "txt" && $FileType != "doc" && $FileType != "docx" && $FileType != "xls" && $FileType != "xlsx" && $FileType != "ppt" && $FileType != "pptx" && $FileType != "rtf" && $FileType != "gif" && $FileType != "csv" && $FileType != "PDF" && $FileType != "JPEG" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "PHP" && $FileType != "HTML" && $FileType != "JS" && $FileType != "CSS" && $FileType != "ZIP" && $FileType != "TXT" && $FileType != "DOC" && $FileType != "DOCX" && $FileType != "XLS" && $FileType != "XLSX" && $FileType != "PPT" && $FileType != "PPTX" && $FileType != "RAR" && $FileType != "GIF" && $FileType != "rar") {
                            echo "Sorry. Your file format not accepted here.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Your file was not uploaded";
                        } else {
                                $basename = basename($_FILES['reposit_file']['name']);
                                $basename0 = $basename;
                                $inc = 1;
                        
                                while (file_exists('Repositories/'. $to_reposit .'/'. $basename)) {
                                $basename = $inc++ .' '. $basename0;
                                }
                        
                            if (move_uploaded_file($_FILES["reposit_file"]["tmp_name"], "Repositories/". $to_reposit ."/". $basename)) {
                            echo "The file ". basename($_FILES["reposit_file"]["name"]) . " has been uploaded.";
                            } else {
                            echo "There was an error while uploading your file.";
                            }
                        }
                    }
                }
                ?>
 
              </div>
          </div>
        </div>
      </div>
    </div>
  </footer>