<?php
session_start();
require 'login_auth.php';
require 'db.php';

?>

<?php require 'dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h2>Welcome To Dashboard, <strong><?= $assoc_header['user_name'] ?></strong></h2>

                    <div class="mb-3 mt-4 p-2">
                        <?php if ($assoc_header['img'] == null) { ?>
                            <img width="200" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80.avif" alt="">
                        <?php } else { ?>
                            <img width="200" height="170" style="border-radius:50%;" src="Uploads/Admin/<?= $assoc_header['img'] ?>" alt="">
                        <?php } ?>


                    </div>

                </div>
                <div class="card-body">
                    <p>This is Your Admin Dashbaord. You can manage your site using this dashbaord. only admin can access for this dashboard. also you can see the summury view of your website</p>
                </div>
            </div>
        </div>
    </div>
</div>




















<?php require 'dashboard_parts/Footer.php'; ?>