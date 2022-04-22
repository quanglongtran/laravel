<?php
$i = 1;
if ($i % 2 == 0) {
    echo "$i is: even" . "<br/>";
    $i += 1;
} else if ($i % 2 > 0) {
    echo "$i is: odd" . "<br/>";
    $i += 1;
} else {
    echo "haha";
};

switch ($i) {
    case 1: echo 1; break;
    case 2: echo 2; break;
    case 3: echo 3; break;
    case 4: echo 4; break;
    case 5: echo 5; break;
    case 6: echo 6; break;
    case 7: echo 7; break;
    case 8: echo 8; break;
}
?>

