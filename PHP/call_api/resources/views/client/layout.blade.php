<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('block.libs')
    <title>@yield('title')</title>
</head>

<body>

    @if (session('message'))
        <div class="popup-notification">
            <div class="popup-notification-body">
                <div class="alert alert-{{session('type')}}">{{session('message')}}</div>
                <div class="title hidden">Click to remove this warning</div>
            </div>
        </div>
    @endif

    @yield('content')
    <script src="{{asset('assets/js/app.js')}}"></script>
</body>
@include('block.popup')

</html>