<?php
session_start();
require_once ('connect.php');
require_once ('function.php');
if(isset($_POST['new_password']) && isset($_POST['cf_new_password']) && isset($_POST['old_password'])) {
    $new_password = $_POST['new_password'];
    $cf_new_password = $_POST['cf_new_password'];
    $old_password = pwdencryption($_POST['old_password']);
    $email = $_POST['email'];

    $sql = "select * from users where email = ? and password = ?";
    if($new_password == '' || $cf_new_password == '' || $old_password == '') {
        danger('Please fill in all fields!!!'); die();
    } else if($new_password != $cf_new_password){
        danger('Confirm password is incorrect!!!'); die();
    } else if (checkUserExist($sql, $email, $old_password) <= 0) {
        danger('Password is incorrect!!!'); die();
    }

    $new_password = pwdencryption($new_password);
    $sql = "update users set password = ? where email = ?";
    updateUser($sql, $new_password, $email);
    alert('success', 'Changed password successfully');
}