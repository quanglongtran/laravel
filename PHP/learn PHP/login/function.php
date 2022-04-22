<?php
function pwdencryption($pwd) {
    return md5(md5($pwd).MD5_PRIVATE_KEY);
}

function select_stmt($param0, $param1) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $param0);
    mysqli_stmt_bind_param($stmt, 's', $param1);
    mysqli_stmt_execute($stmt);
    return mysqli_num_rows(mysqli_stmt_get_result($stmt));
    $conn->close();
};

function checkUserExist($param, $param2, $param3) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $param);
    mysqli_stmt_bind_param($stmt, 'ss', $param2, $param3);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['id'] = $row['id'];
    };
    return mysqli_num_rows($result);
    $conn->close();
};

function updateUser($param, $param2, $param3) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $param);
    mysqli_stmt_bind_param($stmt, 'ss', $param2, $param3);
    mysqli_stmt_execute($stmt);
    $conn->close();
};

function insert_stmt($param, $param2, $param3, $param4, $param5, $param6) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $param);
    mysqli_stmt_bind_param($stmt, 'sssss', $param2, $param3, $param4, $param5, $param6);
    mysqli_stmt_execute($stmt);
    $conn->close();
};

function deleteUser($sql, $email, $password) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    $conn->close();
}

function danger($param) {
    echo "<div class='alert alert-danger'>$param</div>";
}

function alert($type, $content) {
    echo "<div class='alert alert-$type'>$content</div>";
}