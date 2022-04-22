<?php
function myFn($x = 0, $y = 0) {
    $result =  $x + $y;
    echo $result . " <br/>"
    . "Random number ". rand(10, 100);
};
 myFn(15, 10);
?>