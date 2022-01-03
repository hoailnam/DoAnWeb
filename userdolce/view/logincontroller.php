<?php
if (count($_POST) > 0) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!empty($email) && !empty($pass)) {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
}
