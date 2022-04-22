<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'C2010L');

define('MD5_PRIVATE_KEY', '09JJJjhh7834jHJG876312^&%shjdgsjagdasKoks');

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}