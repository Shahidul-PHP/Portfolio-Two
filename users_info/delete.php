<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$delete_user = "DELETE FROM users WHERE id = $id";

$res = mysqli_query($db_connection, $delete_user);

$_SESSION['success'] = "Information deleted Successfully";
header('location:user_list.php');
