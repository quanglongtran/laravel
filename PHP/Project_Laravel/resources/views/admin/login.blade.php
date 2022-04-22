<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/fonts/fontawesome-6-pro.css')}}">
    <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap4.6.0.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <title>{{$title}}</title>
    <style>
        .container {
            overflow: hidden;
        }

        .ml-100p {
            margin-left: 100%;
        }

        .nav-link {
            cursor: pointer;
            font-weight: 500;
            color: var(--primary-color);
        }

        .col-6 {
            transition: 0.5s ease-in-out;
        }

        .ml--50p {
            margin-left: -50%;
        }

        .ml-50p {
            margin-left: 50%;
        }

        .popup {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .popup-body {
            padding: 22px 10px 21px;
            background-color: #fff;
            border-radius: 4px;
            animation: fade 0.8s ease-in 3s forwards
        }

        .popup .alert {
            animation: fade 0.8s ease-in 3s forwards;
        }

        @keyframes fade {
            0% {
                opacity: 0.5;
                transform: scale(0.5);
                display: block;
            }

            30% {
                opacity: 1;
                transform: scale(1);
            }

            60% {
                opacity: 0.5;
                transform: scale(0.5);
            }

            100% {
                opacity: 0;
                transform: scale(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="login-register" style="flex-wrap: nowrap">
            <div class="col-6 offset-3" id="login">
                <form action="{{route('admin.checkLogin')}}" method="POST" class="p-4 table-bordered">
                    @csrf
                    <h3 class="my-4">Đăng nhập vào trang quản trị</h3>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" autocomplete="off"
                            name="username" value="admin">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="password" name="password" value="admin">
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <input type="submit" value="Đăng nhập" class="btn btn-primary">
                        <span class="nav-link text-primary p-0" style="font-weight: 500" onclick="showRegister()">Đăng
                            ký &nbsp;
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </div>
                </form>
            </div>

            <div class="col-6 ml-50p offset-3" id="register">
                <form action="{{route('admin.checkAdminExists')}}" method="POST" class="p-4 table-bordered">
                    @csrf
                    <h3 class="my-4">Đăng ký quản trị viên</h3>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" autocomplete="off"
                            name="username" value="admin">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="password" name="password" value="admin">
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <input type="submit" value="Đăng ký" class="btn btn-primary">
                        <span class="nav-link text-primary p-0" style="font-weight: 500" onclick="showLogin()">Đăng nhập
                            &nbsp;
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(session('msg'))
    <div class="popup text-center d-flex">
        <div class="popup-body">
            <span class="alert alert-{{session('type')}}">{{session('msg')}}</span>
        </div>
        <script>
            $('.popup').on('click', function () {
                this.remove()
            })
            setTimeout(() => {
                $('.popup').remove()
                }, 3800);
        </script>
    </div>
    @endif
</body>
<script src="./assets/js/owl.carousel.min.js"></script>
<script>
    function showRegister() {
        $('#login').addClass('ml--50p')
        $('#register').removeClass('ml-50p')
    }
    function showLogin() {
        $('#login').removeClass('ml--50p')
        $('#register').addClass('ml-50p')
    }
</script>

</html>