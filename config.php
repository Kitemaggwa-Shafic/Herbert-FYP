<?php
ini_set('date.timezone','Africa/Kampala');
date_default_timezone_set('Africa/Kampala');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "researcher";
if(!defined('base_url')) define('base_url','http://localhost/online research mgt/');

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Connection failed");
?>