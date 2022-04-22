<?php
const int = 10;
const PI = 3.14159265359;
$fullName = 'Tran Quang Long';
define('welcome', 'Hello world');
$arr = [
  'TRAN', 'QUANG', 'LONG'
];
$arr2 = array(
    "fullName" => "Tran Quang Long",
    "gender" => "Male",
    "age" => "18",
    "address" => "Ha Noi, Vietnam"
);


echo int . '<br/>';
echo PI . '<br/>';
echo $fullName . '<br/>';
echo welcome . '<br/>';
echo $arr["2"] . ' ' . "(length: " . sizeof($arr) . ")" . '<br/>';
echo $arr2["gender"];
?>