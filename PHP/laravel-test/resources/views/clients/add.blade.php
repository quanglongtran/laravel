@extends('layouts.clients')

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="" method="post">
        <input type="text" name="username">
        @csrf
        <button type="submit">Submit</button>

        @method('PUT')
    </form>
@endsection

@section('title')
    {{$title}}
@endsection

@section('css')
    <style type="text/css">
        header{
            /* background-color: pink; */
        }
    </style>
@endsection

@section('js')
    <script>
        console.log(123)
    </script>
@endsection