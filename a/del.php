<?php
require_once('inc/sessionzr.php');
include '../config.php';

 $dt = date('U');
 if (isset($_GET['d'])) {
    $del_nm = $conn->real_escape_string($_GET['d']);
    unlink('../research library/'.$del_nm);
    $conn->query("DELETE FROM library WHERE filename = '$del_nm'");
    header('Location: lib.php');
}
?>