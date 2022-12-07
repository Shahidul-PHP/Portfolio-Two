<?php
session_start();
require '../db.php';

$office = $_POST['office'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$after_escape = mysqli_real_escape_string($db_connection,$office);

$update_office = "UPDATE address SET office='$after_escape', phone='$phone', email='$email'";
$res = mysqli_query($db_connection,$update_office);

$_SESSION['done'] = "Address Edited Succssfully";
header('location:edit.php'); 






?>