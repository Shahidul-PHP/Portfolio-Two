<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$sub_title = $_POST['sub_title'];
$after_escape = mysqli_real_escape_string($db_connection,$sub_title);
$title = $_POST['title'];
$designation = $_POST['designation'];


$update_header = "UPDATE header SET sub_title='$after_escape', title='$title', designation='$designation'";
$update_result = mysqli_query($db_connection,$update_header);

$_SESSION['done'] = "Information Update Successfully";
header('location:add.php');




?>