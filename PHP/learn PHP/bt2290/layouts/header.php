
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./libs/jquery3.6.0.js"></script>
    <script src="./libs/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./libs/bootstrap.min.css">
    <title>Products Page</title>
    <style>
        .row{
            min-height: 700px;
        }
    </style>
</head>
<body>
    <!--header-->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="navbar-item active">
                    <a href="products.php" class="nav-link">Home</a>
                </li>
                <li class="navbar-item active">
                    <a href="products.php" class="nav-link">Shop</a>
                </li>
                <li class="navbar-item active">
                    <a href="#" class="nav-link">Track Order</a>
                </li>
                <li class="navbar-item active">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="navbar-item active">
                    <a href="#" class="nav-link">About</a>
                </li>
            </ul>

            <?php
            $cart = [];
            if (isset($_COOKIE['cart'])) {
                $json = $_COOKIE['cart'];
                $cart = json_decode($json, true);
            }
            $count = 0;
            foreach ($cart as $item) {
                $count += $item['num'];
            }
            ?>
            <a href="cart.php">
                <button type="button" class="btn btn-primary " style="">
                    <span>Cart <span class="badge bg-light" style="color: #000"><?=$count?></span></span>
                </button>
            </a>
        </div>
    </nav>