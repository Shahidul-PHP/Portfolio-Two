<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_header = "SELECT * FROM header";
$res = mysqli_query($db_connection, $select_header);
$res2 = mysqli_fetch_assoc($res);

$select_img = "SELECT * FROM header_img";
$img_res = mysqli_query($db_connection, $select_img);



?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2>Add Header Information</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>
                </div>
                <div class="card-body">
                    <form action="add_post.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="<?= $res2['id'] ?>">

                            <input type="text" name="sub_title" class="form-control" value="<?= $res2['sub_title'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" value="<?= $res2['title'] ?>">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="designation" class="form-control" value="<?= $res2['designation'] ?>">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h2>Add Header Image</h2>
                    <?php if (isset($_SESSION['successImg'])) { ?>
                        <strong class="text-success"><?= $_SESSION['successImg'] ?></strong>
                    <?php }
                    unset($_SESSION['successImg']) ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['error'] ?></strong>
                    <?php }
                    unset($_SESSION['error']) ?>

                </div>
                <div class="card-body">

                    <form action="photo_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">

                            <input type="file" name="header_photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Upload Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h2>Show Added Image's</h2>
                    <?php if (isset($_SESSION['delete'])) { ?>
                        <strong class="text-success"><?= $_SESSION['delete'] ?></strong>
                    <?php }
                    unset($_SESSION['delete']) ?>
                </div>
                <div class="card-header">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Satatus</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($img_res as $sl => $banner) { ?>
                            <tr>
                                <td><?= $sl + 1 ?></td>
                                <td><img width="110" src="../Uploads/Header/<?= $banner['img'] ?>" alt=""></td>

                                <td> <a class="btn btn-<?= ($banner['status'] == 1) ? 'success' : 'secondary' ?> text-capitalize w-50 btn-sm" href="photo_status.php?id=<?= $banner['id'] ?>"><?= ($banner['status'] == 1) ? 'active' : 'deactive' ?></a></td>

                                <td>
                                    <a href="delete.php?id=<?= $banner['id'] ?>" class="delete-btn btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>








<?php require '../dashboard_parts/Footer.php'; ?>