<?php
session_start();
require '../db.php';

$id  = $_SESSION['id'];
$admin_profile = "SELECT * FROM users WHERE id=$id";
$result_profile = mysqli_query($db_connection, $admin_profile);
$assoc_profile = mysqli_fetch_assoc($result_profile);

?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">

                    <?php if ($assoc_profile['img'] == null) { ?>
                        <img class="rounded" width="150" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80.avif" alt="">
                    <?php } else { ?>
                        <img width="80" src="../Uploads/Admin/<?= $assoc_profile['img'] ?>" alt="">
                    <?php } ?>

                    <h3 class="mb-2 mt-2"><?= $assoc_profile['user_name'] ?></h3>

                    <div class="text-muted mb-2">Junior Web Developer</div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">Skills</h5>
                    <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                    <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                    <a href="#" class="badge bg-primary me-1 my-1">React</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                    <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                    <a href="#" class="badge bg-primary me-1 my-1">UX</a>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">San Francisco, SA</a></li>

                        <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
                        <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Boston</a></li>
                    </ul>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">Elsewhere</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="#">Twitter</a></li>
                        <li class="mb-1"><a href="#">Github</a></li>
                        <li class="mb-1"><a href="#">Facebbok</a></li>
                        <li class="mb-1"><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2>Update Your Profile</h2>
                </div>
                <div class="card-body">
                    <form action="profile_post.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $assoc_header['id'] ?>">

                            <input name="name" type="text" class="form-control p-2" value="<?= $assoc_header['user_name'] ?>">
                        </div>

                        <div class="mb-3">
                            <input name="email" type="text" class="form-control p-2" value="<?= $assoc_header['email'] ?>">
                        </div>

                        <div class="mb-3">
                            <input name="password" type="password" class="form-control p-2" value="" placeholder="Update Password">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Save Info</button>
                        </div>
                    </form>

                    <form action="photo.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-2">
                            <label class="mb-1" for="profile_photo">Upload Your Profile Picture</label>

                            <input type="hidden" name="id" value="<?= $assoc_header['id'] ?>">

                            <input name="profile_photo" type="file" class="form-control p-2" value="">
                            <div class="text-left m-2">
                                <?php if (isset($_SESSION['error'])) { ?>
                                    <strong class="text-warning"><?= $_SESSION['error'] ?></strong>
                                <?php }
                                unset($_SESSION['error']); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">Upload Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
















<?php require '../dashboard_parts/Footer.php'; ?>