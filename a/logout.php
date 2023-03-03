<?php
session_start();

unset($_SESSION['a_go_uname']);
unset($_SESSION['a_go_pwd']);
unset($_SESSION['a_go_accountid']);

header('Location: ../');
?>
