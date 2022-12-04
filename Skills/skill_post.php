<?php
session_start();
require '../db.php';

$desp = $_POST['desp'];
$title = $_POST['title'];
$percent = $_POST['percent'];

$insert_skill = "INSERT INTO skills(desp,title,percent) VALUES('$desp','$title','$percent')";
$insert_res = mysqli_query($db_connection,$insert_skill);

$_SESSION['done'] ="Skills added Successfully";
header('location:add_skill.php');


?>