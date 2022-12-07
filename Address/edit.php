<?php
session_start();
require '../login_auth.php';
require '../db.php';


$select_office = "SELECT * FROM address";
$up = mysqli_query($db_connection, $select_office);
$assoc = mysqli_fetch_assoc($up); 


?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <!-- adding -->
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Address</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']) ?>
                </div>
                <div class="card-body">
                    <form action="edit_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="office" placeholder="Office Address" value="<?=$assoc['office']?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Cell Number" value="<?=$assoc['phone']?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Mail Address" value="<?=$assoc['email']?>">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-info">Save Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../dashboard_parts/Footer.php'; ?>