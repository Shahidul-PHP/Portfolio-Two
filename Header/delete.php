<?php
session_start();
require '../db.php';


$id = $_GET['id'];
$delete = "DELETE FROM header_img WHERE id=$id";
$result = mysqli_query($db_connection,$delete);


$_SESSION['delete'] = "Image Deleted Successfully";
header('location:add.php');
