<?php
session_start();
require_once ('connect.php');
require_once ('function.php');
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = pwdencryption($_POST['password']);

    $sql = "select * from users where email = ? and password = ?";

    if(checkUserExist($sql, $email, $password) <= 0) {
        alert('danger', 'Email or password is incorrect!!!');
        $_SESSION['boolean'] = false;
        die();
    };

    if(isset($_POST['remember'])) {
        $remember = $_POST['remember'];
        if($remember == 'yes') {
            setcookie('email', $email);
            setcookie('password', $_POST['password']);
            echo 'yes';
        } else {
            echo 'no';
            setcookie('email', '');
            setcookie('password', '');
        }
    }

    $_SESSION['boolean'] = true;
    $boolean = true;
}
?>
<script>
    window.location.reload()
</script>
