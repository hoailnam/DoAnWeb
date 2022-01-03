<?php
function checkEmailValid($email)
{
    $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/";
    return (!preg_match($pattern_email, $email)) ? FALSE : TRUE;
}

function checkPasswordValid($password)
{
    $pattern = "/^[a-zA-Z-' ]*$/";
    return (!preg_match($pattern, $password)) ? FALSE : TRUE;
}

function connectDatabase()
{
    $servername = "localhost";
    $database = "lt_web";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    $conn = null;
}

function checkEmail($name)
{
    $stmt = connectDatabase()->prepare("SELECT user_name FROM user WHERE user_name ='$name'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}

function checkPass($pass, $name)
{
    $stmt = connectDatabase()->prepare("SELECT user_pass FROM user WHERE user_name ='$name'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}

function signIn($name, $pass)
{

    if (checkEmail($name) > 0  && checkPass($pass, $name) > 0) {
        $stmt = connectDatabase()->prepare("SELECT user_id,user_name FROM user WHERE user_name ='$name'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        session_start();
        $_SESSION["user_id"] = $result[0]['user_id'];
        $_SESSION["user_name"] = $result[0]['user_name'];
        
        header("Location: ../view/index.php");
        return $result;
    } else {
        header("Location: ../view/signin.php?Message=Sign in failed!!! Please try again");
    }
}

function signOut()
{
    if (isset($_SESSION['user_name'])) {
        unset($_SESSION['user_name']);
        session_destroy();
        header("Location: ../view/index.php?Message=Change password successful !!! Please sign in !!!");
    }
}


function signUp($user)
{
    $user_id = $user->get_userid();
    $user_name = $user->get_username();
    $pass = $user->get_password();
    $address = $user->get_address();
    $phone = $user->get_phone();
    $hash = $pass;


    $stmt = connectDatabase()->prepare("INSERT INTO user (user_id,user_name, user_pass, user_phone, user_address) 
    VALUES (:user_id,:user_name,:user_pass,:user_phone,:user_address)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':user_pass', $hash);
    $stmt->bindParam(':user_address', $address);
    $stmt->bindParam(':user_phone', $phone);
    $stmt->execute();

    session_start();
    $_SESSION["user_id"] = $user_id;
    $_SESSION["user_name"] = $user_name;
    
}

function get_infor($name)
{
    include_once '../model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM USER WHERE user_name='$name'");
    $stmt->execute();
    $user = $stmt->fetchAll();

    foreach ($user as $row) {
        $user = new User(
            $row['user_id'],
            $row['user_name'],
            $row['user_pass'],
            $row['user_phone'],
            $row['user_address'],
        );
    }

    return $user;
}


function changePass($new_pass, $name)
{
    $stmt = connectDatabase()->prepare("UPDATE user set user_pass='$new_pass' WHERE user_name = '$name'");
    $stmt->execute();
    signOut();
}

function inforProduct($id)
{

    include_once("../model/product.php");
    $stmt = connectDatabase()->prepare("SELECT * FROM PRODUCT WHERE product_id='$id';");
    $stmt->execute();
    $product = $stmt->fetchAll();
    foreach ($product as $row) {
        $product = new Product(
            $row['product_id'],
            $row['product_name'],
            $row['product_img'],
            $row['product_price'],
            $row['list_id']
        );
    }
    return $product;
}

function addProduct()
{

    // include_once("../model/product.php");
    $id = $_POST['id'];

    $qty = 1;


    $product = inforProduct($id);

    $listProduct = array(
        $product->get_id() => array(
            'name' => $product->get_name(),
            'id' => $product->get_id(),
            'qty' =>  $qty,
            'price' =>  $product->get_price(),
            'image' => $product->get_image(),
        )
    );


    session_start();
    if (!empty($_SESSION['cart_item'])) {
        if (in_array($product->get_id(), array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION['cart_item'] as $k => &$v) {
                if ($product->get_id() == $_SESSION['cart_item'][$k]['id']) {
                    $_SESSION['cart_item'][$k]['qty'] += $qty;
                }
            }
        } else
            $_SESSION['cart_item'] +=  $listProduct;
    } else
        $_SESSION['cart_item'] = $listProduct;
    header('Location: ../view/cart.php');
}

function removeProduct()
{
    session_start();
    if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_POST["id"] == $_SESSION["cart_item"][$k]['id'])
                unset($_SESSION["cart_item"][$k]);
        }
    }
}

function updateProduct()
{
    session_start();
    if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_POST["id"] == $_SESSION["cart_item"][$k]['id']) {
                if ($_POST['qty'] == 0)
                    unset($_SESSION["cart_item"][$k]);
                else
                    $_SESSION["cart_item"][$k]['qty'] = $_POST['qty'];
            }
        }
    }
}

if (isset($_POST['user'])) {
    switch ($_POST['user']) {
        case 'signin':
            $name = $_POST['username'];
            $pass = $_POST['password'];

            signIn($name, $pass);
            break;

        case 'signup':

            $user_name = $_POST['username'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phone = $_POST['phonenumber'];
            $id = null;
            include "../model/user.php";

            $user = new User($id, $user_name, $pass, $address, $phone);

            if ($confirm == $pass) {
                if (checkEmail($user->get_username()) == 0) {
                    signUp($user);
                    header("Location: ../view/index.php?Message=Welcome to our website !!!");
                } else {
                    header("Location: ../view/signup.php?Message=Email already exist!!! Please try again");
                }
            } else {
                header("Location: ../view/signup.php?Message=Password incorrect! Please try again");
            }
            break;

        case 'changepass':

            session_start();
            $name = $_SESSION["user_name"];
            $old_pass = $_POST['password'];
            $new_pass = $_POST['new_password'];
            $confirm = $_POST['confirm'];

            if ($confirm == $new_pass) {
                if (checkPass($old_pass, $name))
                    changePass($new_pass, $name);
                else
                    header("Location: ../view/information.php?Message=Incorrect password !!!");
            }

            break;
    }
}

// if (isset($_GET['cart']) == 'cart') {
//     include_once '../model/product.php';

//     addProduct();
//     header('Location: ../view/category.php');
// }

if (isset($_POST['cart']))
    switch ($_POST['cart']) {
        case 'add':

            addProduct();
            break;
        case 'remove':

            removeProduct();
            header('Location: ../view/cart.php');
            break;

        case 'update':

            updateProduct();
            header('Location: ../view/cart.php');
            break;

        default:
            # code...
            break;
    }

if (isset($_GET['checkout'])) {
    session_start();
    if (empty($_SESSION["user_name"]))
        header('Location: ../view/signin.php');
    else
        header('Location: ../view/checkout.php');
}
