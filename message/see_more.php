<?php
session_start();
require '../login_auth.php';
require '../db.php';

$id = $_GET['id'];

$update_msg = "UPDATE messages SET status = 1 WHERE id=$id";
mysqli_query($db_connection, $update_msg);


$show_msg = "SELECT * FROM messages WHERE id=$id";
$res = mysqli_query($db_connection, $show_msg);
$messages = mysqli_fetch_assoc($res);


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- show added items -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>See User's Sending Message's Here</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td><strong class="text-primary"><?= $messages['name'] ?></strong></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><strong class="text-primary"><?= $messages['email'] ?></strong></td>
                        </tr>

                        <tr>
                            <th>Subject</th>
                            <td><strong class="text-primary"><?= $messages['sub'] ?></strong></td>
                        </tr>

                        <tr>
                            <th>Details</th>
                            <td><strong class="text-primary"><?= $messages['desp'] ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../dashboard_parts/Footer.php'; ?>