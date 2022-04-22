<?php
require_once('connect.php');
require_once('function.php');
$count = 1;
$email = 'user' . $count . '@gmail.com';
$password = 'aa3a5464ff6880389fd7e809c4652487';
$fullname = "User $count";
$birthday = '20031014';
$address = "Hanoi, Vietnam";
$sql = "select * from users where email = ?";
$num_row = select_stmt($sql, $email);



echo "if";
if ($num_row <= 0) {
    echo "if";
    while ($count <= 10) {
        echo $count;
        $email = 'user' . $count . '@gmail.com';
        $fullname = "User $count";
        adduser($fullname, $password, $email, $birthday, $address);
        $count++;
    }
}


function adduser($fullname, $password, $email, $birthday, $address) {
    $query = "insert into users (fullname, password, email, birthday, address) value (?,?,?,?,?)";
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'sssss', $fullname, $password, $email, $birthday, $address);
    mysqli_stmt_execute($stmt);
}
