@extends('client.layout')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-5 offset-1">
            <form action="{{route('loginHandle')}}" method="POST" style="border: 1px solid #ccc; padding: 10px 20px;">
                @csrf
                <div class="mb-3 text-center"><h1>Đăng nhập</h1></div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" autocomplete="off" 
                    value="long@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" 
                    value="123456789">
                </div>

                <input type="submit" value="Login" class="mb-3 btn btn-primary" style="margin-left: auto;">
            </form>
        </div>

        <div class="col-5">
            <form action="{{route('registerHandle')}}" method="POST" style="border: 1px solid #ccc; padding: 10px 20px;">
                @csrf
                <div class="mb-3 text-center"><h1>Đăng ký</h1></div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" autocomplete="off" value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" value="123456789">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Confirmation Password</label>
                    <input type="password" name="password_confirmation" class="form-control" value="123456789">
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Fullname</label>
                    <input type="text" name="fullname" class="form-control" value="{{old('fullname')}}">
                    @error('fullname')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Avatar</label>
                    <input class="form-control" type="file" name="image">
                  </div>

                <input type="submit" value="Đăng ký" class="mb-3 btn btn-primary" style="margin-left: auto;">
            </form>
        </div>
    </div>
</div>
@endsection