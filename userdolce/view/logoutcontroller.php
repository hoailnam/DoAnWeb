<?php
if (!isset($_SESSION)) {
    session_start();
    unset($_SESSION['email']);
    session_destroy();
    header("Location: index.php");
}
