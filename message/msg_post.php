<?php
session_start();
require '../login_auth.php';
require '../db.php';

date_default_timezone_set("Asia/Dhaka");
$name = $_POST['name'];
$email = $_POST['email'];
$sub = $_POST['sub'];
$desp = $_POST['desp'];
$date = date("Y-m-d h:i A");
$after_desp = mysqli_real_escape_string($db_connection,$desp); 


$insert_msg = "INSERT INTO messages(name,email,sub,desp,date) VALUES('$name','$email','$sub','$after_desp','$date')";

$res = mysqli_query($db_connection,$insert_msg);

$_SESSION['done'] = "Messege Send Successfully";
header('location:../index.php#contact');





?>