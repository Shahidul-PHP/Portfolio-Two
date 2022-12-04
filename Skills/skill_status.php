<?php
require '../db.php';

$id = $_GET['id'];

$select_skills = "SELECT * FROM skills WHERE id = $id";
$make_skills_query = mysqli_query($db_connection, $select_skills);
$after_assoc_skills = mysqli_fetch_assoc($make_skills_query);



if ($after_assoc_skills['status'] == 1) {
    $update = "UPDATE skills SET status = 0 WHERE id = $id";
    $conection = mysqli_query($db_connection, $update);
    header('location:add_skill.php');
} else {
    $update = "UPDATE skills SET status=1 WHERE id=$id";
    $conection = mysqli_query($db_connection, $update);
    header('location:add_skill.php');
}
