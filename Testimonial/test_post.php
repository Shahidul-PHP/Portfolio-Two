<?php
session_start();
require '../db.php';

$desp = $_POST['desp'];
$name = $_POST['name'];
$designation = $_POST['designation'];

$insert = "INSERT INTO testimonial(desp,name,designation) VALUES('$desp','$name','$designation')";

$res = mysqli_query($db_connection,$insert);

$_SESSION['done'] = "Testimonial Addedd Successfully";
header('location:add.php'); 



?>
