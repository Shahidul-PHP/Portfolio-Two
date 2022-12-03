<?php 
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$flag = true;


$select = "SELECT COUNT(*)  as find FROM users WHERE email = '$email'";
$make_query = mysqli_query($db_connection,$select);
$make_assoc = mysqli_fetch_assoc($make_query);

if($make_assoc['find'] == 1){
    $select_pass = "SELECT * FROM users WHERE email = '$email'";
    $make_query_pass = mysqli_query($db_connection, $select_pass);
    $make_assoc_pass = mysqli_fetch_assoc($make_query_pass);

    if(password_verify($password, $make_assoc_pass['password'])){
        if($make_assoc_pass['user_role'] == 1){
            $_SESSION['role_confirm'] = 'success dashboard';
            $_SESSION['login_confirm'] = 'success';
            $_SESSION['id'] = $make_assoc_pass['id'];
            header('location:dashboardTwo.php');
            $flag = false;
        }else{
            $_SESSION['login_confirm'] = 'success';
            $_SESSION['id'] = $make_assoc_pass['id'];
            header('location:index.php');
            $flag = false;
        }
    }else{
        if(empty($password)){
            $_SESSION['Passerror'] = "Enter a Password First";
            header('location:loginTwo.php');
            $flag = false;
        }else{
            $_SESSION['Passerror'] = "You Entered a Wrong Password";
            header('location:loginTwo.php');
            $flag = false;
        } 
    }
}else{
    if(empty($email)){
        $_SESSION['error'] = "Enter Your Email";
        header('location:loginTwo.php');
        $flag = false;
    }else{
        $_SESSION['error'] = "Invalid Email Address";
        header('location:loginTwo.php');
        $flag = false;
    }
    $_SESSION['login_value'] = $email;
    header('location:loginTwo.php');
}
