<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_skill_show = "SELECT * FROM skills";
$result_skill_show = mysqli_query($db_connection, $select_skill_show);


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Skills</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>

                </div>
                <div class="card-body">
                    <form action="skill_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="desp" placeholder="Description">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="percent" placeholder="SKill Percent">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">Add Skills</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- show added items -->
        <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>
                        <h2>Show Added Skills</h2>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>SL</td>
                            <td>Title</td>
                            <td>Percent</td>
                            <td>Status</td>
                        </tr>
                        <?php foreach ($result_skill_show as $sl => $show_skill) { ?>
                            <tr>
                                <td><?= $sl + 1 ?></td>
                                <td><?= $show_skill['title'] ?></td>
                                <td><?= $show_skill['percent'] ?></td>
                                <td> <a class="btn btn-<?= ($show_skill['status'] == 1) ? 'success' : 'secondary' ?> text-capitalize w-50 btn-sm" href="skill_status.php?id=<?= $show_skill['id'] ?>"><?= ($show_skill['status'] == 1) ? 'active' : 'deactive' ?></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_SESSION[''])) { ?>
    <strong><?= $_SESSION[''] ?></strong>
<?php }
unset($_SESSION['']) ?>


<?php require '../dashboard_parts/Footer.php'; ?>