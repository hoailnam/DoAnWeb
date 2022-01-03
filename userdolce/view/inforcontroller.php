<?php
function printUserList($arr = array())
{
    // echo '<table border="1" class = "table ">';
    // echo '<thead>';
    // echo '<tr>';
    // echo '<th class = "serial">#</th>';
    // echo '<th class = "avatar">Avatar</th>';
    // echo '<th>ID</th>';
    // echo '<th>UserName</th>';
    // echo '<th>Email</th>';
    // echo '<th>Birthday</th>';
    // echo '<th>Status</th>';
    // echo '<th colspan = "2">Action</th><!--comment-->';

    // echo '</tr>';
    // echo '</thead>';
    // echo '<tbody>';
    echo ' <div class="col-md-12 form-group">';
    echo '                      <input type="text" class="form-control" id="username" name="username" placeholder="Username">';
    echo '                  </div>';
    echo '                  <div class="col-md-12 form-group">';
    echo '                <input type="email" class="form-control" id="email" name="email" placeholder="Email">';
    echo '            </div>';
    echo '            <div class="col-md-12 form-group">';
    echo '                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password" >';
    echo '            </div>';
    echo '            <div class="col-md-12 form-group">';
    echo '                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password" ">';
    echo '            </div>';
    echo '            <div class="col-md-12 form-group">';
    echo '                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" >';
    echo '            </div>';
    echo '            <div class="col-md-12 form-group">';
    echo '                <input type="text" class="form-control" id="address" name="address" placeholder="Address" >';
    echo '            </div>';
    echo '            <div class="col-md-12 form-group">';
    echo '                <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number" >';
    echo '            </div>';
    echo '            <div class="col-md-12">';
    echo '                <div>';
    echo '                    <h5>Gender</h5>';
    echo '                </div>';
    echo '                <p>';
    echo '                    <label class="radio">';
    echo '                        <span><input type="radio" id="male" name="name"></span>';
    echo '                        Male';
    echo '                    </label>';
    echo '                    <label class="radio">';
    echo '                        <input type="radio" id="female" name="name">';
    echo '                        Female';
    echo '                   </label>';
    echo '                     <label class="radio">';
    echo '                        <input type="radio" id="other" name="name" checked>';
    echo '                        Other';
    echo '                    </label>';
    echo '                </p>';
    echo '            </div>';
}
$user_01 = array("username" => "lamnhungoc", "email" => "lamnhungoc@gmail.com", "password" => "ldt", "bio" => "Mau hong manh me", "sex" => "KXĐ", "role" => "admin", "perfer" => "football,walking", "avatar" => "images/logo.png");
$userList = array($user_01);

if (count($_POST) > 0) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $genders = $_POST['genders'] ? $_POST['genders'] : "";
    $agree = $_POST['agree'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm) && !empty($address) && !empty($phonenumber) && !empty($genders) && !empty($agree)) {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: index.php");
    } else {
        header("Location: registration.php");
    }
}
