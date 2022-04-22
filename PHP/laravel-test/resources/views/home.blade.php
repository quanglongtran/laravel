<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/clients/css/style.css">
    <title>Học Laravel</title>
    
    <style>
        *{
            color: #000;
            text-decoration: none;
        }
        body{
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 500;
            opacity: 0.7;
            cursor: default;
        }
        h1{
            text-align: center;
        }
        .product.grid a{
            display: inline-block;
            padding: 15px 17px;
        }
        .items:hover{
            background-color: #f2f2f2;
            box-shadow: 0 2px 6px rgb(44 44 44 / 30%);
        }
        .grid{
            display: grid;
            gap: 10px;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .grid.result{
            margin-top: 40px;
        }
        .items{
            display: block;
            font-family: sans-serif;
            font-size: 16px;
            font-weight: 600;
            padding: 8px 12px;
            border: 1px solid #999;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.25s;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: 0.25s;
            box-shadow: 0 4px 6px rgb(44 44 44 / 20%);
        }
    </style>
</head>
<body>
<!-- <?php echo route('fa-pro') ?> -->
    <h1>{{!empty(request()->keyword)?request()->keyword:$data}}&nbsp;<i class="fa-duotone fa-house-user"></i> </h1>
    <div class="grid product" style="margin-top: 10px;">
        <a class="items" href="<?php echo route('admin.show-form'); ?>">Show form</a>
        <a class="items" href="<?php echo route('admin.add'); ?>">Add Product</a>
        <a class="items" href="<?php echo route('admin.edit'); ?>">Edit Product</a>
        <a class="items" href="<?php echo route('admin.product'); ?>">Product List</a>
        <a class="items" href="<?php echo route('admin.remove'); ?>">Remove Product</a>
        <a class="items" href="<?php echo route('admin.news', ['id' => 1, 'slug' => 'tin-tuc-the-gioi']); ?>">View News</a>
    </div>

    @include('parts.result')
</body>
<script>
</script>
</html>