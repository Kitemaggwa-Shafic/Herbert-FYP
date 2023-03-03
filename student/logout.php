<?php
session_start();

unset($_SESSION['s_go_uname']);
unset($_SESSION['s_go_pwd']);
unset($_SESSION['s_go_accountid']);

header('Location: ../');
?>
