<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{$icon}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>{{$title}}</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-4">
                <form action="" method="POST">
                    @csrf
                    @if (session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif

                    @if ($errors -> any)
                        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
                    @endif
                    <div class="mb-3">
                        <h5>Họ và tên</h5>
                        <input type="text" name="fullname" placeholder="Họ và tên" class="form-control" value="{{old('fullname')}}">
                        @error('fullname')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h5>Địa chỉ email</h5>
                        <input type="text" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Đăng ký" class="btn btn-primary">
                    <a href="{{route('users')}}" class="btn btn-primary">Danh sách người dùng</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>