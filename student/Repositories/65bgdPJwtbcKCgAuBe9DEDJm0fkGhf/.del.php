<?php
require '../../../student/inc/sessionzr.php';
require '../../../config.php';
 $dt = date('U');

 if (isset($_GET['f'])) {
    $del_nm = $conn->real_escape_string($_GET['f']);
    $repoid = file_get_contents('.Repository ID.txt');
    $student_ID = file_get_contents('.Student ID.txt');
    if ($student_ID === $this_accID) {
        unlink($del_nm);
        header('Location: ../'.$repoid.'/.index.php');
    } else {
        echo '<p style = "background-color: blue; padding: 10px 10px; font-family: arial; font-weight: bold; color: white; text-align: center;">You cannot delete from a repository belonging to another student</p>';
    }
}
?>