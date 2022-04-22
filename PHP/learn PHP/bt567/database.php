<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'BanHang';

function createDatabase() {
  $conn = new mysqli(HOST, USERNAME, PASSWORD);
  mysqli_set_charset($conn, 'utf8');
  $sql = 'create database if not exists ' . DATABASE;
  mysqli_query($conn, $sql);
  mysqli_close($conn);
};

function createTable() {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    $sql = 'create table if not exists sanpham (
    id int primary key auto_increment,
    thumbnail varchar (200),
    title varchar (150) not null,
    price int default 0,
    discount int default 0
)';
    mysqli_query($conn, $sql);
    mysqli_close($conn);
};

function initData() {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    for ($i = 0; $i < 20; $i++) {
        $sql = 'insert into sanpham (thumbnail, title, price, discount) value ("https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cmFuZG9tfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
    "Ao khoac du Pilot - '.$i.'", "'.(200000 + 20 * $i).'", "'.(100000 + 20 * $i).'")';
        mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
}

function executeResult($sql) {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    $data = [];
    $resutl = mysqli_query($conn, $sql);
    mysqli_close($conn);
    while ($row = mysqli_fetch_array($resutl, 1)) {
        $data[] = $row;
    }
    return $data;
};

createDatabase();
createTable();
//initData();