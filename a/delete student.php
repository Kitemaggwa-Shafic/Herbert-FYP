<?php
include 'inc/sessionzr.php';
include '../config.php';

if (isset($_POST['df'])){
  $studnt = $conn->real_escape_string($_POST['df']);

  $conn->query("DELETE FROM students WHERE account_id = '$studnt'");
  header('location:students.php');
}
?>