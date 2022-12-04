<?php
require '../db.php';

$id = $_GET['id'];

$select_edu = "SELECT * FROM skills WHERE id = $id";
$make_edu_query = mysqli_query($db_connection, $select_edu);
$after_assoc_edu = mysqli_fetch_assoc($make_edu_query);



if ($after_assoc_skills['status'] == 1) {
    $update = "UPDATE educations SET status = 0 WHERE id = $id";
    $conection = mysqli_query($db_connection, $update);
    header('location:add_edu.php');
} else {
    $update = "UPDATE educations SET status=1 WHERE id=$id";
    $conection = mysqli_query($db_connection, $update);
    header('location:add_edu.php');
}
