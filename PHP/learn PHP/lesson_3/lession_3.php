<?php
$arr = [
    "Tran", "Quang", "Long"
];
const db = [
    "server" => "Long",
    "users" => "sa",
    "password" => "1234",
    "name" => "testdb"
];

 foreach (db as $key => $value) {
     echo $key . ": " . $value . "<br/>";
}
echo "<hr>";
 foreach($arr as $value) {
     echo $value . " ";
 }
?>
