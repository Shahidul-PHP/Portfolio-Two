<?php
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM header_img WHERE id = $id";
$make_status_query = mysqli_query($db_connection, $select_status);
$after_assoc = mysqli_fetch_assoc($make_status_query);



if ($after_assoc['status'] == 1) {
    $update = "UPDATE header_img SET status = 0 WHERE id = $id";
    $conection = mysqli_query($db_connection, $update);
    header('location:add.php');
} else {
    $update = "UPDATE header_img SET status = 0";
    $conection = mysqli_query($db_connection, $update);
    header('location:add.php');

    $update2 = "UPDATE header_img SET status = 1 WHERE id = $id";
    $conection = mysqli_query($db_connection, $update2);
    header('location:add.php');
}
