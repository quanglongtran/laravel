<?php
require_once ('db/dbhelper.php');
require_once ('utils/utility.php');
include_once('layouts/header.php');

$id = getGet('id');
$product = executeResult("select * from products where id =" . $id, true);
if ($product == null) {
    header('location: products.php');
    die();
}
?>

    <!--body-->
    <div class="container">
        <div class="row">
            <div class="col col-md-5">
                <img src="<?=$product['thumbnail']?>" width="100%">
            </div>

            <div class="col col-md-7">
                <h4><?=$product['title']?></h4>
                <p style="font-size: 36px; color: red">
                    <?=number_format($product['price'], 0, ',', ',')  . ' '.'đ';?>
                </p>
                <button class="btn btn-primary btn-block" style="width: 100%; font-size: 30px;" onclick="addToCart(<?=$product['id']?>)">Add to cart</button>
            </div>

            <div class="col col-md-12">
                <?=$product['content']?>
                <br>
                <?=$product['content']?>
                <br>
                <?=$product['content']?>
                <br>
                <?=$product['content']?>
            </div>
        </div>
    </div>

    <script>
        function addToCart(id) {
            $.post('./api/cookie.php',
            {
                'action': 'add',
                'id': id,
                'num': 1
            },
            function(data) {
                location.reload()
            })
        }
    </script>

<?php
include_once('layouts/footer.php');
?>