<?php 
session_start();
require '../db.php';

$upload_photo = $_FILES['profile_photo'];
$id = $_POST['id'];

$after_explode = explode('.',$upload_photo['name']);
$extension = end($after_explode);
$allow = array('jpg','JPEG','jpeg','JPG','PNG','png','gif','webp','avif');

if(in_array($extension,$allow)){
    if($upload_photo['size'] <= 5000000){
        //make file name and change location
        $select_photo = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($db_connection, $select_photo);
        $after_assoc_img = mysqli_fetch_assoc($result);

        $delete_from = '../uploads/Admin/' . $after_assoc_img['photo'];
        unlink($delete_from);

        $file_name = $id . '.' . $extension;
        $new_location = '../uploads/Admin/' . $file_name;
        move_uploaded_file($upload_photo['tmp_name'], $new_location);
        //update query for send image in DB
        $update_img = "UPDATE users SET img = '$file_name' WHERE id = $id";
        mysqli_query($db_connection, $update_img);
        header('location:../dashboardTwo.php');

    }else{
        $_SESSION['error'] = "File is too large. Max file size is 5 MB";
        header('location:profile.php');
    }
}else{
    $_SESSION['error'] = "Invalid Image Extension";
    header('location:profile.php');
}








?>