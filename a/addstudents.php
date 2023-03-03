<?php
include 'inc/sessionzr.php';
include '../config.php';

if (isset($_POST['addstudent'])){
  $studntname = $conn->real_escape_string($_POST['stdntname']);
  $studntregno = $conn->real_escape_string($_POST['regno']);

  $salt = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36),0,14);
  $hash = $salt . md5($salt . $studntregno);

  // id. generator
  function random_strings($length_of_string){
    $str_result = '1234567890QWERTYUIOPASQWERghjklzxcvbnm';
    return substr(str_shuffle($str_result), 0 , $length_of_string);
  }

  $new_accID = $conn->real_escape_string(random_strings(32));

  $tmp = $new_accID;
  $inc = 1;
  $valid = false;

  // lookup if the username is in use
  $qid = $conn->query("select account_id from students where account_id = '$new_accID'");
  if(mysqli_num_rows($qid) == 0) $valid = true;

  // if it is in use, keep looking up until a valid username is found 
  while(!$valid) {
      $new_accID = $tmp . $inc; // append number
      $qid = $conn->query("select account_id from students where account_id = '$new_accID'");
      if(mysqli_num_rows($qid) == 0) $valid = true;
      $inc++;
  }

  $dt = date('U');

  $conn->query("INSERT INTO students(dt, account_id, student_name, reg_no, student_pwd) VALUES('$dt', '$new_accID', '$studntname', '$studntregno', '$hash')");
  header('location:dashboard.php');
}
?>