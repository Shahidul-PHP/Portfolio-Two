<?php
session_start();
require '../login_auth.php';
require '../db.php';

$show_msg = "SELECT * FROM messages";
$res = mysqli_query($db_connection, $show_msg);



?>

<?php require '../dashboard_parts/Header.php'; ?>

<style>
    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container">
    <div class="row">

        <!-- show added items -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Show Messeages</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">

                            <th>SL</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($res as $sl => $msg) { ?>
                            <tr class="<?= ($msg['status'] == 0) ? 'bg-light' : '' ?>">
                                <td><?= $sl + 1 ?></td>

                                <td> <strong class="text-<?= ($msg['status'] == 1) ? 'success' : 'dark' ?> text-capitalize btn-sm"><?= ($msg['status'] == 1) ? 'Read' : 'Unread' ?></strong></td>

                                <td><?= $msg['name'] ?></td>
                                <td><?= $msg['email'] ?></td>
                                <td><?= $msg['sub'] ?></td>

                                <td><?= substr($msg['desp'], 0, 10) ?><a href="see_more.php?id=<?= $msg['id'] ?>"> ...See more</a></td>

                                <td>
                                    <a href="#" class="m-auto  mb-2 btn-sm btn btn-danger">delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                        <tr>
                            <?php if(mysqli_num_rows($res) == 0) {?>
                                <td colspan="7" class="text-danger text-center">No Message Found !!</td>
                            <?php }?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../dashboard_parts/Footer.php'; ?>