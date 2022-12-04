<?php
session_start();
require '../db.php';

$project_image = $_FILES['project'];
$name = $project_image['name'];
$make_explode = explode('.', $project_image['name']);
$extension = end($make_explode);
$allow = array('jpg', 'jpeg', 'png', 'webp', 'JPG', 'JPEG', 'PNG');

if (in_array($extension, $allow)) {
    if ($banner_image['size'] <= 1000000) {
        //insert data
        $insert_banner = "INSERT INTO projects(photo) VALUES ('$name')";
        $make_bannerImg_query = mysqli_query($db_connection, $insert_banner);
        $last_id = mysqli_insert_id($db_connection);
        //make file name
        $file_name = $last_id . '.' . $extension;
        $new_location = '../Uploads/Pro/' . $file_name;
        move_uploaded_file($project_image['tmp_name'], $new_location);
        //update database with image name
        $update_bannerImg = "UPDATE projects SET photo='$file_name' WHERE id='$last_id'";
        $query = mysqli_query($db_connection, $update_bannerImg);
        $_SESSION['successImg'] = "Image Update Successfully";
        header('location:add_project.php');
    } else {
        $_SESSION['error'] = "File size is too Large !!";
        header('location:add_project.php');
    }
} else {
    $_SESSION['error'] = "Invalid Extension";
    header('location:add_project.php');
}
