<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_edu = "SELECT * FROM educations";
$res = mysqli_query($db_connection, $select_edu);


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Education</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>

                </div>
                <div class="card-body">
                    <form action="edu_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Education Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="year" placeholder="Education Year">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="institute_name" placeholder="Instiute Name">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Add Education</button>
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
                        <h2>Show Educations Here</h2>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>SL</td>
                            <td>Title</td>
                            <td>Year</td>
                            <td>Institute</td>
                            <td>Status</td>
                        </tr>
                        <?php foreach ($res as $sl => $education) { ?>
                            <tr>
                                <td><?= $sl + 1 ?></td>
                                <td><?= $education['title'] ?></td>
                                <td><?= $education['year'] ?></td>
                                <td><?= $education['institute'] ?></td>
                                <td> <a class="btn btn-<?= ($education['status'] == 1) ? 'success' : 'secondary' ?> text-capitalize  btn-sm" href="edu_status.php?id=<?= $education['id'] ?>"><?= ($education['status'] == 1) ? 'active' : 'deactive' ?></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../dashboard_parts/Footer.php'; ?>