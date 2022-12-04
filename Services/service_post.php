<?php
session_start();
require '../db.php';

$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$insertServ = "INSERT INTO services(sub_title,title,desp) VALUES('$sub_title','$title','$desp')";

$service_query = mysqli_query($db_connection,$insertServ);

$_SESSION['done'] = "Services Insert Successfully";
header('location:add_service.php');



?>