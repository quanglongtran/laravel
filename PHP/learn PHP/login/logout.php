<?php
session_start();
session_destroy();
if (isset($_COOKIE) && $_COOKIE['delete']) {
    setcookie('email', '');
    setcookie('password', '');
}

header('location: login.php');