<?php

$connect = mysqli_connect('localhost', 'root', '', 'banhang');

$record_per_page = 5;
$page = 1;
$search_page = 1;
$output = '';

if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} else {
    $keyword = '';
}
echo $keyword;
$start_from = ($page - 1) * $record_per_page;

$query = "select * from sanpham where title like '%$keyword%' limit $start_from, $record_per_page ";

$result = mysqli_query($connect, $query);


?>
<div class="row">
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="col col-lg-3">
            <div class="card">
                <img src="<?= $row['thumbnail'] ?>" class="card-img-top" />
                <div class="card-body">
                    <h5 class="card-title"><?= $row['title'] ?></h5>
                    <p class="card-text">
                        <span class="text-primary">Price :<?= $row['price'] ?></span>
                        <span class="text-primary">Discount :<del><?= $row['discount'] ?></del></span>
                    </p>
                    <a href="#" class="btn btn-primary">Buy now</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
$page_query = "select * from sanpham where title like '%$keyword%'";
$page_result = mysqli_query($connect, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_page = ceil($total_records / $record_per_page);
?>
<nav>
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $total_page; $i++) {
            if ($page != $i) {
                if ($i > $page - 3 && $i < $page + 3) {
        ?>
                    <li class='page-item pagination_link' keyword="<?= $keyword ?>" id="<?= $i ?>">
                        <a class='page-link' href=''><?= $i ?></a>
                    </li>
                <?php
                }
            } else {
                ?>
                <strong>
                    <li class='page-item pagination_link disabled' style="pointer-events: none" id="<?= $i ?>">
                        <a class='page-link' href='' style='color: red'><?= $i ?></a>
                    </li>
                </strong>
        <?php }
        }


        ?>
    </ul>
</nav>