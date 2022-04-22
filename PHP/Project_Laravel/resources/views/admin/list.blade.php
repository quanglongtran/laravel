<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap4.6.0.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{asset('assets/css/fonts/fontawesome-6-pro.css')}}">
    <link rel="icon" href="{{$icon}}">
    <title>{{$title}}</title>
    <style>
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
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Danh sách người dùng</h1>
                <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
                <hr>
                <table class="table table-bordered" style="font-size: 12px;font-weight: 500">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Account type</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- $id, $fullname, $email, $account_type, $address, $created_at, $updated_at --}}
                    <tbody>
                        @if(!empty($users))
                        @foreach ($users as $key => $user)
                        
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$user -> id}}</td>
                            <td>{{$user -> fullname}}</td>
                            <td>{{$user -> email}}</td>
                            <td>{{$user -> account_type}}</td>
                            <td>{{$user -> address}}</td>
                            <td>{{$user -> created_at}}</td>
                            <td></td>
                            <td class="p-0" width="6%">
                                <div class="btn btn-primary" data-bs-toggle="collapse"
                                    data-bs-target="#option-{{$user->id}}">Option</div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="9" class="p-0">
                                <div class="collapse" id="option-{{$user->id}}" style="margin: 8px 0;text-align:center;">
                                    <a href="{{route('admin.editUser', ['id'=>$user->id])}}" class="btn btn-warning mr-3">Edit</a>
                                    <a href="#" class="btn btn-danger ml-3">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <th rowspan="2" colspan="9" class="text-danger">
                                Không có người dùng
                                <i class="fa-regular fa-circle-exclamation"></i>
                            </th>
                        </tr>
                        @endif
                    </tbody>
                </table>
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
<script>
</script>

</html>