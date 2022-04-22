<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Thêm thư mục</title>
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
    <form method="post" action="<?php echo route('categories.upload') ?>" enctype="multipart/form-data">
        <h1>Thêm thư mục</h1>
        <div class="form-group">
            <input type="file" name="photo" class="form-control-file">
        </div>
        <?php echo csrf_field() ?>
        <input type="submit" value="Upload" class="btn btn-primary">
    </form>
</body>
</html>