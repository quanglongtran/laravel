<?php

require_once('../db/dbhelper.php');
require_once('../db/config.php');
require_once('../utils/utility.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if(isset($_POST["id_3"]) && isset($_POST["password_3"]) && isset($_POST["new_name"])) {
    $id_3 = $_POST["id_3"];
    $pwdmd5_2 = getPwdSecurity($_POST["password_3"]);
    $new_name = $_POST["new_name"];

    $sql = "select * from users where id = '$id_3' and password = '$pwdmd5_2'";
    $ketqua = $conn->query($sql);

    if ($ketqua->num_rows > 0) {
        $sql = "update users set fullname = '$new_name' where id = '$id_3'";
        $conn->query($sql);
        echo "<div class='alert alert-success' role='alert'>Change name success user: \'" . $new_name . "\'</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>The account does not exist or the password is incorrect!!!</div>";
    };
}