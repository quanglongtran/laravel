<?php
require_once('../db/dbhelper.php');
require_once('../db/config.php');
require_once('../utils/utility.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);


if (isset($_POST["pwdmd5_2"]) && isset($_POST["id_2"])) {
    $pwdmd5_2 = getPwdSecurity($_POST["pwdmd5_2"]);
    $id_2 = $_POST["id_2"];

    $sql = "select * from users where id = '$id_2' and password = '$pwdmd5_2'";
    $ketqua = $conn->query($sql);

    if ($ketqua->num_rows > 0) {
        $sql = "delete from users where id = '$id_2'";
        $conn->query($sql);
        echo "<div class='alert alert-success' role='alert'>Delete success user: " . $_POST['fullname_2'] . "</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>The account does not exist or the password is incorrect!!!</div>";
    };
}
?>
<script>
    // window.location.reload();
</script>
