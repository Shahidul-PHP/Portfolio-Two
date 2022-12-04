<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_services = "SELECT * FROM services";
$serv_query = mysqli_query($db_connection, $select_services);


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Service Here</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>
                </div>
                <div class="card-body">
                    <form action="service_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="sub_title" placeholder="Sub Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="desp" placeholder="Description">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- show added items -->
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>
                        <h2>My Service's</h2>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>SL</td>
                            <td>Service Name</td>
                            <td>Price</td>
                            <td>Description</td>

                        </tr>
                        <?php foreach ($serv_query as $sl=> $service) { ?>
                            <tr>
                                <td><?=$sl + 1?></td>
                                <td><?=$service['sub_title']?></td>
                                <td><?=$service['title']?></td>
                                <td><?=$service['desp']?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require '../dashboard_parts/Footer.php'; ?>