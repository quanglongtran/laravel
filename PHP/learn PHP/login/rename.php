<?php
session_start();
require_once ('connect.php');
require_once ('function.php');
if (isset($_POST['new_name']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $new_name = $_POST['new_name'];
    $password = pwdencryption($_POST['password']);

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $sql = "select * from users where email = ? and password = ?";
    if ($new_name == '' || $password == '') {
        danger('Please fill in all fields!!!');
        die();
    } else if (checkUserExist($sql, $email, $password) <= 0) {
        danger('Password is incorrect!!!');
        die();
    } else {
        $sql = "update users set fullname = ? where email = ?";
        updateUser($sql, $new_name, $email);
        $_SESSION['fullname'] = $new_name;
        alert('success', 'Successfully renamed' . $_SESSION['fullname']);
    }
}
?>
<script>
    window.location.reload();
</script>
