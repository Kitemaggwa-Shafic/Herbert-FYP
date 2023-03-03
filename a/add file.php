<?php
require_once('inc/sessionzr.php');
include '../config.php';

 $dt = date('U');
 if (isset($_POST['addFile'])) {
    if (basename($_FILES["documentadd"]["name"] !== "")) {
        $target_dir = '../research library/';
        $target_file = $target_dir . basename($_FILES["documentadd"]["name"]);
        $uploadOk = 1;
        $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $thefile_basenm = basename($_FILES["documentadd"]["name"]);

        if ($FileType != "pdf" && $FileType != "jpeg" && $FileType != "jpg" && $FileType != "png" && $FileType != "php" && $FileType != "html" && $FileType != "js" && $FileType != "css" && $FileType != "zip" && $FileType != "txt" && $FileType != "doc" && $FileType != "docx" && $FileType != "xls" && $FileType != "xlsx" && $FileType != "ppt" && $FileType != "pptx" && $FileType != "rtf" && $FileType != "gif" && $FileType != "csv" && $FileType != "PDF" && $FileType != "JPEG" && $FileType != "JPG" && $FileType != "PNG" && $FileType != "PHP" && $FileType != "HTML" && $FileType != "JS" && $FileType != "CSS" && $FileType != "ZIP" && $FileType != "TXT" && $FileType != "DOC" && $FileType != "DOCX" && $FileType != "XLS" && $FileType != "XLSX" && $FileType != "PPT" && $FileType != "PPTX" && $FileType != "RTF" && $FileType != "GIF" && $FileType != "CSV") {
            echo '<div style = "background-color: #263b47; color: #f1a804; font-family: arial; font-weight: bold; text-align: center; padding: 20px;">Your file or document is not accepted</div>';
            $uploadOk = 0;
        }
    
        // Check file size max(7mbs)
        if ($_FILES["documentadd"]["size"] > 7000000) {
            echo'<div style = "background-color: #263b47; color: #f1a804; font-family: arial; font-weight: bold; text-align: center; padding: 20px;"> The file is too large. Photo should not exceed 7mbs.</div>';
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<div style = "background-color: #263b47; color: #f1a804; font-family: arial; font-weight: bold; text-align: center; padding: 20px;">There was an error while uploading your photo.</div>';
        }else {
            if(move_uploaded_file($_FILES["documentadd"]["tmp_name"], "../research library/".$dt." - ".$thefile_basenm)) {
                $conn->query("INSERT INTO library( dt, filename) values( '$dt', '$dt - $thefile_basenm')");
                echo '<div style = "background-color: #263b47; color: #f1a804; font-family: arial; font-weight: bold; text-align: center; padding: 20px;">Your file or document  uploaded successfully</div>';
                header('Location: ../a/lib.php');
            } else {
                echo '<div style = "background-color: #263b47; color: #f1a804; font-family: arial; font-weight: bold; text-align: center; padding: 20px;">There was an error uploading your file</div>';
            }
        }
    } 
}
?>