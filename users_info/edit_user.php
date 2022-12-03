<?php
session_start();
require '../login_auth.php';
require '../db.php';

$id = $_GET['id'];
$select = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($db_connection,$select);
$after_assoc_user = mysqli_fetch_assoc($result);

?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Users Information</h2>
                    
                </div>
                <div class="card-body">
                    <form action="update.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$id?>">

                            <input name="name" type="text" class="form-control p-2" value="<?=$after_assoc_user['user_name']?>">
                        </div>

                        <div class="mb-3">
                            <input name="email" type="text" class="form-control p-2" value="<?=$after_assoc_user['email']?>">
                        </div>

                        <div class="mb-3">
                            <input name="password" type="password" class="form-control p-2" value="" placeholder="Update Password">
                        </div>

                        <div class="mb-3">
                           <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







<?php require '../dashboard_parts/Footer.php'; ?>