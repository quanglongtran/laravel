<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap-5/bootstrap.min.css">
    <title>{{$title}}</title>
</head>
<body>
    <div class="container">
        <div class="col-5 offset-3">
            <div class="row">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/bootstrap-5/bootstrap.min.js"></script>
</html>