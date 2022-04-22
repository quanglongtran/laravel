<?php
session_start();
require_once ('connect.php');
require_once ('function.php');
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cf_password']) && isset($_POST['fullname']) && isset($_POST['birthday']) && isset($_POST['address'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cf_password = $_POST['cf_password'];
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $sql = "select * from users where email = ?";
    $check_month = substr($birthday, 0, 2);
    $check_date = substr($birthday, 3, 2);


    if($email == '' || $password == '' || $cf_password == '' || $fullname == '' || $birthday == '' || $address == '') {
        danger('Please fill all field!!!'); $_SESSION['login'] = false; die();
    } else if ($password != $cf_password) {
        danger('Confirm password is incorrect!!!'); $_SESSION['login'] = false; die();
    } else if (strlen($address) < 6){
        danger('Min length is 6 character!!!'); $_SESSION['login'] = false; die();
    } else if ($birthday[2] != '/' or $birthday[5] != '/' || substr($birthday, 0, 2) > 12) {
        danger('The format of date of birth has not been entered correctly!!!'); $_SESSION['login'] = false; die();
    } else if (select_stmt($sql, $email) > 0) {
        danger('Email already exists!!!'); $_SESSION['login'] = false; die();
    } else {

    }

    if($check_month == 1 && $check_date > 31) {
        danger('January no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 2 && $check_date > 29) {
        danger('February no more than 29 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 3 && $check_date > 31) {
        danger('March no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 4 && $check_date > 30) {
        danger('April no more than 30 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 5 && $check_date > 31) {
        danger('May no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 6 && $check_date > 30) {
        danger('June no more than 30 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 7 && $check_date > 31) {
        danger('July no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 8 && $check_date > 31) {
        danger('August no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 9 && $check_date > 30) {
        danger('September no more than 30 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 10 && $check_date > 31) {
        danger('October no more than 31 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 11 && $check_date > 30) {
        danger('November no more than 30 days!!!'); $_SESSION['login'] = false; die();
    } else if($check_month == 12 && $check_date > 31) {
        danger('December no more than 31 days!!!'); $_SESSION['login'] = false; die();
    }

    echo "<div class='alert alert-success'>Success</div>";

    setcookie("regsuccess", "true", time()+1, "/");

    $birthday = substr($birthday, 6, 4) . substr($birthday, 0, 2). substr($birthday, 3, 2);
    $sql = "insert into users (email, password, fullname, birthday, address) values (?, ?, ?, ?, ?)";
    insert_stmt($sql, $email, pwdencryption($password), $fullname, $birthday, $address);
}
?>
<script>
    window.location='user.php';
</script>
