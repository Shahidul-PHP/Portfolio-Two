<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$years = $_POST['year'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$num_one = $_POST['num_one'];
$num_two = $_POST['num_two'];
$desp_one = $_POST['desp_one'];
$desp_two = $_POST['desp_two'];

$update_exp = "UPDATE experience SET years='$years', title='$title', desp='$desp',num_one='$num_one',num_two='$num_two', desp_one='$desp_one',desp_two='$desp_two'";

$exp_res = mysqli_query($db_connection, $update_exp);

$_SESSION['update'] = "Edit Successfull";
header('location:exp.php');



?>