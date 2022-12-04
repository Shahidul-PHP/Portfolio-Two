<?php
session_start();
require '../login_auth.php';
require '../db.php';


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-7 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Testimonial Section</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>

                </div>
                <div class="card-body">
                    <form action="test_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Description" name="desp">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Designation" name="designation">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../dashboard_parts/Footer.php'; ?>