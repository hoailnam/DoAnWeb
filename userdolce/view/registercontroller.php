<?php
if (count($_POST) > 0) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $male = isset($_POST['male']) ? $_POST["male"] : "";
    $female = isset($_POST['female']) ? $_POST["female"] : "";
    $other = isset($_POST['other']) ? $_POST["other"] : "";
    $agree = isset($_POST['agree']) ? $_POST["agree"] : "";

    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm) && !empty($address) && !empty($phonenumber) && !empty($agree)) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;
        $_SESSION["address"] = $address;
        $_SESSION["phonenumber"] = $phonenumber;
        $_SESSION["male"] = $phonenumber;
        $_SESSION["female"] = $phonenumber;
        $_SESSION["other"] = $phonenumber;

        header("Location: index.php");
    } else {
        header("Location: registration.php");
    }
}
