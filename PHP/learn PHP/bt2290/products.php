<?php
require_once ('db/dbhelper.php');
require_once ('utils/utility.php');
include_once('layouts/header.php');

$id = getGet('id');
$productList = executeResult("select * from products where id $id");
?>

<!--body-->
<div class="container">
    <div class="row">
        <?php
        foreach ($productList as $item) {
            echo '<div class="col col-md-3 col-6">
            <a href="details.php?id='. $item['id'] .'"><img src="' . $item['thumbnail'] . '" width="100%"></a>
            <a  style="text-decoration: none;" href="details.php?id='. $item['id'] .'"><p>'.$item['title'].'</p></a>
            <p class="text-danger">' . number_format($item['price'], 0, ',', ',')  . ' '.'đ'.'</p>
        </div>';
        }
        ?>
    </div>
</div>

<?php
include_once('layouts/footer.php');
?>
