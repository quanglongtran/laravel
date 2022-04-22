<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
    <style>
        form{
            width: 40%;
            margin: 100px auto;
            border-radius: 8px;
            border: 8px double #ccc;
            padding: 30px;
        }
        h1{
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo route('categories.add') ?>">
        <h1>Thêm chuyên mục</h1>
        <div class="form-group">
            <input type="text" name="category_name" placeholder="Tên chuyên mục" class="form-control" value="<?php echo old('category_name', 'Trần Quang Long') ?>" autocomplete="off">
        </div>
        <?php echo csrf_field() ?>
        <!-- <input type="hidden" name="_token" value="<?php // echo csrf_token() ?>"> -->
        <input type="submit" value="Thêm" class="btn btn-primary">
    </form>
</body>
</html>