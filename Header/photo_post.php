<?php 
session_start();
require '../login_auth.php';
require '../db.php';

$banner_image = $_FILES['header_photo'];
$name = $banner_image['name'];
$make_explode = explode('.',$banner_image['name']);
$extension = end($make_explode);
$allow = array('jpg','jpeg', 'png', 'webp', 'JPG','JPEG','PNG');

if(in_array($extension,$allow)){
    if($banner_image['size'] <= 1000000){
        //insert data
        $insert_banner = "INSERT INTO header_img(img) VALUES ('$name')";
        $make_bannerImg_query = mysqli_query($db_connection,$insert_banner);
        $last_id = mysqli_insert_id($db_connection);
        //make file name
        $file_name = $last_id. '.' .$extension;
        $new_location = '../Uploads/Header/'.$file_name;
        move_uploaded_file($banner_image['tmp_name'], $new_location);
        //update database with image name
        $update_bannerImg = "UPDATE header_img SET img='$file_name' WHERE id='$last_id'";
        $query = mysqli_query($db_connection,$update_bannerImg);
        $_SESSION['successImg'] = "Image Update Successfully";
        header('location:add.php');

    }else{
        $_SESSION['error'] = "File size is too Large !!";
        header('location:add.php');  
    }
}else{
    $_SESSION['error'] = "Invalid Extension";
    header('location:add.php');
}
