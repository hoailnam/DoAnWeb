<?php
session_start();
// unset($_SESSION);
// session_destroy();
echo "<pre>";
print_r($_POST);
print_r($_SESSION);
echo "</pre>";
