<?php
$my_data = $conn->query("SELECT * FROM students WHERE account_id = '$this_accID'");
if (mysqli_num_rows($my_data) > 0) {
    $my_data_r = $my_data->fetch_assoc();
    $my_id = $my_data_r['account_id'];
} else {
    // Script dies from here
}
?>