<?php
session_start();
require 'db.php';


//name validation

$name = $_POST['name'];
$flag = true;

if (empty($name)) {
    $_SESSION['nameError'] = 'Please Enter Your Name';
    header('location:signup.php');
    $flag = false;
} else {
    if (!preg_match("/^[a-z A-z]*$/", $name)) {
        $_SESSION['nameError'] = 'Only Alphabet is Allowed';
        header('location:signup.php');
        $flag = false;
    }
}

// email validation

$email = $_POST['email'];

if (empty($email)) {
    $_SESSION['mailError'] = 'Enter Your Mail Please';
    header('location:signup.php');
    $flag = false;
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mailError'] = "Email Format Doesn't Mathed";
        header('location:signup.php');
        $flag = false;
    }
}

// password validation
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,^.&,*,\,~,!!,!]@', $password);

if (empty($password)) {
    $_SESSION['passError'] = 'Provide a Password Please';
    header('location:signup.php');
    $flag = false;
} else {
    if (!$upper || !$lower || !$number || !$spsl || strlen($password) < 8) {
        $_SESSION['passError'] = 'Password Should be 1 uppercase, 1 lowercase, special character <br> and minumum 8 Character !! ';
        header('location:signup.php');
        $flag = false;
    }
}

// validation end


// if flag and all are true

if ($flag) {
    //data insert into database
    $insert_users  = "INSERT INTO users(user_name,email,password) VALUES('$name','$email','$after_hash')";
    mysqli_query($db_connection, $insert_users);

    $_SESSION['confirmation'] = 'Account Created Successfully ! You can Login Now';
    header('location:loginTwo.php');
}

// if flag false

else {
    $_SESSION['name_value_error'] = $name;
    $_SESSION['mail_value_error'] = $email;
    header('location:signup.php');
}
