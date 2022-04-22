<?php
require_once('connect.php');

$current_page = 1;
$item_per_page = 2;
$offset = ($current_page - 1) * $item_per_page;

if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
    $a = $_POST['keyword'];
        $keyword = "%$a%";
    $sql = "select * from sanpham where title like '%$a%' limit $offset, $item_per_page";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result) . "<br/>";
    while ($row = mysqli_fetch_array($result, 1)) {
        echo '<div class="col col-lg-3">
        <div class="card"">
        <img src="'.$row['thumbnail'].'" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">'.$row['title'].'</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      </div>';
    }
} else {

}
