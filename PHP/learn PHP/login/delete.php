<?php
session_start();
require_once ('connect.php');
require_once ('function.php');

if (isset($_POST['password_delete']) && isset($_POST['cf_password_delete'])) {
    $password = $_POST['password_delete'];
    $cf_password = $_POST['cf_password_delete'];
    $email = $_POST['email_delete'];
    echo $_POST['email_delete'];

    $sql = "select * from users where email = ? and password = ?";
    if ($password != $cf_password) {
        alert('danger','Confirm password is incorrect!!!'); die();
    }
    $password = pwdencryption($password);
    if (checkUserExist($sql, $email, $password) <= 0) {
        alert('danger','Password is incorrect!!!'.$email); die();
    } else {
        $sql = "delete from users where email = ? and password = ?";
        deleteUser($sql, $email, $password);
        alert('success', 'Delete Successfully');
        setcookie('delete', true);
    }

}
?>
<script>
    window.location = 'logout.php';
</script>
