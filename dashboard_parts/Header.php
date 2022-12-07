<?php

$id = $_SESSION['id'];

$select_admin_header = "SELECT * FROM users WHERE id=$id";
$result_header = mysqli_query($db_connection, $select_admin_header);
$assoc_header = mysqli_fetch_assoc($result_header);

$select_msg = "SELECT COUNT(*) as total FROM messages WHERE status=0";
$result = mysqli_query($db_connection, $select_msg);
$assoc_msg = mysqli_fetch_assoc($result);

$select_sender = "SELECT * FROM messages WHERE status=0";
$sender = mysqli_query($db_connection, $select_sender);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/PortfolioTwo/Dashboard/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin Dashboard</title>

    <link href="/PortfolioTwo/Dashboard/css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <img width="170" src="/portfolioTwo/assets/images/logod2.png" alt="">
                </a>

                <div>
                    <ul class="sidebar-nav mb-3">
                        <li class="sidebar-header">
                            Options
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/dashboardTwo.php">
                                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/users_info/profile.php">
                                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Admin Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-header">
                            User's Information
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/users_info/user_list.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">User List</span>
                            </a>
                        </li>


                        <li class="sidebar-header">
                            General Information Add
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Header/add.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Header</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Experience/exp.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Experience</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Skills/add_skill.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Skills Add</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Education/add_edu.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Educations</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Services/add_service.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Services</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Projects/add_project.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">My Projects</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Testimonial/add.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Testimonial</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/message/show.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">Show Messaged</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../PortfolioTwo/Address/edit.php">
                                <i class="align-middle" data-feather="square"></i> <span class="align-middle">My Address</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>

                </a>

                <div class="navbar-collapse collapse">
                    <h1 class="m-3 p-2 h-3 text-center"><strong>Admin</strong> Dashboard</h1>
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                    <span class="indicator">
                                        <?= $assoc_msg['total'] ?>
                                    </span>
                                </div>

                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    <?= $assoc_msg['total'] ?> <strong>New Messages</strong>
                                </div>
                                <div class="list-group">

                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <?php foreach ($sender as $ff) { ?>
                                                <div class="mb-3 col-10">
                                                    <!-- img -->
                                                    <div style="font-size: 15px;" class="text-muted small mt-1"><i class="fa-solid fa-message"></i> <strong><?= $ff['name'] ?></strong> Send You a Message</div>
                                                    <div class="text-muted small mt-1"><?= date($ff['date']) ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">

                                <?php if ($assoc_header['img'] == null) { ?>
                                    <img width="40" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80.avif" alt="">
                                <?php } else { ?>
                                    <img width="40" src="../Uploads/Admin/<?= $assoc_header['img'] ?>" alt="">
                                <?php } ?>

                                <span class="text-dark"><?= $assoc_header['user_name'] ?></span>
                                <span>Admin</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="../../PortfolioTwo/users_info/profile.php"><i class="align-middle me-1" data-feather="user"></i>Profile</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../PortfolioTwo/logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">