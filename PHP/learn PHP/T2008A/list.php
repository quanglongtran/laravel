<!DOCTYPE html>
<html>
<head>
    <title>News Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 style="text-align: center;">Danh sách bài viết</h1>
        </div>

        <div class="panel-body">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'T2008A');

            $sql = "select * from news";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, 1)) {
                echo '<div class="row">
                    <div class="col-md-4">
                        <img src="'.$row['thumbnail'].'" width="100%">
                    </div>
                    <div class="col-md-8">
                        <p>'.$row['title'].'</p>
                        <p>'.$row['updated_at'].'</p>
                    </div>
            </div>';
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>
</div>
</body>
</html>