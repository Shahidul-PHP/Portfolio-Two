<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Create Account</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img width="190" src="assets/images/logod2.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Create New Account</h4>

                        <form action="signup_post.php" method="POST">

                            <div class="form-group mb-3">
                                <label class="floating-label" for="Username">Username</label>
                                <input name="name" type="text" class="form-control" placeholder="" value="<?= isset($_SESSION['name_value_error']) ? $_SESSION['name_value_error'] : '' ?>">

                                <div class="text-left">
                                    <?php if (isset($_SESSION['nameError'])) { ?>
                                        <strong class="text-danger"><?= $_SESSION['nameError'] ?></strong>
                                    <?php }
                                    unset($_SESSION['nameError']) ?>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input name="email" type="text" class="form-control" placeholder="" value="<?= isset($_SESSION['mail_value_error']) ? $_SESSION['mail_value_error'] : '' ?>">

                                <div class="text-left">
                                    <?php if (isset($_SESSION['mailError'])) { ?>
                                        <strong class="text-danger"><?= $_SESSION['mailError'] ?></strong>
                                    <?php }
                                    unset($_SESSION['mailError']) ?>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="">
                                <div class="text-left">
                                    <?php if (isset($_SESSION['passError'])) { ?>
                                        <strong class="text-danger"><?= $_SESSION['passError'] ?></strong>
                                    <?php }
                                    unset($_SESSION['passError']) ?>
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox  text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4">Create Account</button>

                        </form>

                        <p class="mb-2">Already have an account? <a href="loginTwo.php" class="f-w-400">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>

</html>

<?php
unset($_SESSION['name_value_error']);
unset($_SESSION['mail_value_error']);
?>