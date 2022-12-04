<?php
session_start();
require '../login_auth.php';
require '../db.php';


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Project Here</h2>
                    <?php if (isset($_SESSION['successImg'])) { ?>
                        <strong class="text-success"><?= $_SESSION['successImg'] ?></strong>
                    <?php }
                    unset($_SESSION['successImg']) ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <strong class="text-success"><?= $_SESSION['error'] ?></strong>
                    <?php }
                    unset($_SESSION['error']) ?>

                </div>
                <div class="card-body">
                    <form action="project_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">

                            <input type="file" name="project" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- show added items -->
    </div>
</div>


<?php require '../dashboard_parts/Footer.php'; ?>