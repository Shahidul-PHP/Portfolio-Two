<?php 
session_start();
require 'login_auth.php';
require 'db.php';


if (!isset($_SESSION['role_confirm'])) {
    header('location:/PortfolioTwo/warn.php');
    die();
}else{
    header('location:/PortfolioTwo/dashboardTwo.php');
 
}


?>