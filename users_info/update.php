<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email= $_POST['email'];

$password= $_POST['password'];

$after_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($password)) {
    $update_info = "UPDATE users SET user_name='$name', email = '$email' WHERE id= $id";
    mysqli_query($db_connection, $update_info);
    $_SESSION['done'] = "Information Edited Successfully";
    header('location:user_list.php');

} else {
    $update_info = "UPDATE users SET user_name='$name',email = '$email', password = '$after_hash' WHERE id= $id";

    mysqli_query($db_connection, $update_info);
    $_SESSION['done'] = "Information Edited Successfully";
    header('location:user_list.php');
}






?>