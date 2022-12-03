<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_exp = "SELECT * FROM experience";
$exp_res = mysqli_query($db_connection, $select_exp);
$assoc = mysqli_fetch_assoc($exp_res);


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Experience Section</h2>

                    <?php if (isset($_SESSION['update'])) { ?>
                        <strong class="text-success"><?= $_SESSION['update'] ?></strong>
                    <?php }
                    unset($_SESSION['update']) ?>
                </div>
                <div class="card-body">
                    <form action="exp_post.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="<?= $assoc['id'] ?>">

                            <input type="text" name="year" class="form-control" value="<?= $assoc['years'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" value="<?= $assoc['title'] ?>">
                        </div>
                        <div class="mb-3">
                            <input name="desp" class="form-control" rows="7" value="<?= $assoc['desp'] ?>"></input>
                        </div>

                        <div class="mb-3">
                            <input name="num_one" class="form-control" value="<?= $assoc['num_one'] ?>"></input>
                        </div>
                        <div class="mb-3">
                            <input name="num_two" class="form-control" value="<?= $assoc['num_two'] ?>"></input>
                        </div>
                        <div class="mb-3">
                            <input placeholder="happy client" name="desp_one" class="form-control" value="<?= $assoc['desp_one'] ?>"></input>
                        </div>
                        <div class="mb-3">
                            <input name="desp_two" class="form-control" value="<?= $assoc['desp_two'] ?>"></input>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../dashboard_parts/Footer.php'; ?>