<?php
require_once ('database.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            $sql = 'select count(id) as number from sanpham';
            $result = executeResult($sql);
            $number = 0;
            if ($result != null && count($result) > 0) {
                $number = $result[0]['number'];
            }
            $pages = ceil($number / 8);
            $current_page = 1;
            if (isset($_GET['page'])) {
                $current_page = $_GET['page'];
            }
            $index = ($current_page - 1) * 8;

            $sql = 'select * from sanpham limit '.$index.', 8';
            $result = executeResult($sql);
            foreach ($result as $sanpham) {
                echo '
            <div class="col-md-3">
                <img src="'.$sanpham['thumbnail'].'" alt="random" width="100%">
                <p>'.$sanpham['title'].'</p>
                <p class="text-primary">'.number_format($sanpham['price'], 0, ',', ',') .'VNĐ <del class="text-danger">'.number_format($sanpham['discount'], 0, ',', ',') .'VNĐ</del></p>
            </div>';
            }
            ?>
        </div>
        <div class="row">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                }
                ?>
        </div>
    </div>
</body>
</html>