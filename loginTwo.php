<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sign In</title>

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
                        <img width="220" src="assets/images/logod2.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400 mt-2 mb-4">Login Your Account</h4>
                        <form action="login_post.php" method="POST">
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input name="email" type="text" class="form-control" id="Email" placeholder="" value="<?= isset($_SESSION['login_value']) ?  $_SESSION['login_value'] : '' ?>">

                                <div class="text-left">
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error'] ?></p>
                                    <?php }
                                    unset($_SESSION['error']) ?>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input name="password" type="password" class="form-control" id="Password" placeholder="">
                                <div class="text-left">
                                    <?php if (isset($_SESSION['Passerror'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['Passerror'] ?></p>
                                    <?php }
                                    unset($_SESSION['Passerror']) ?>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary mb-4">Log In</button>
                        </form>

                        <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset Here</a></p>
                        <p class="mb-0 text-muted">Don’t have an account? <a href="signup.php" class="f-w-400">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_SESSION['confirmation'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= $_SESSION['confirmation'] ?>',
            showConfirmButton: false,
            timer: 1800
        })
    </script>
<?php }
unset($_SESSION['confirmation']);
unset($_SESSION['login_value']);
?>

</body>
</html>