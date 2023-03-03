<!DOCTYPE html>
<?php
//require_once('inc/sessionzr.php');
include '../config.php';
?>

    <?php
          include '../config.php';

         $recordid=$_GET['recordid']; 
            $conn->query("UPDATE projects SET research_approved = 'TRUE' WHERE recordid = '$recordid'");
            header('location:approved_research.php');
       ?>
  