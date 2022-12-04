<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$year = $_POST['year'];
$institute = $_POST['institute_name'];

$insertData = "INSERT INTO educations(title,year,institute) VALUES('$title','$year','$institute')";

$make_res = mysqli_query($db_connection,$insertData);
$_SESSION['done'] = "Education Done Successfully";
header('location:add_edu.php');















?>