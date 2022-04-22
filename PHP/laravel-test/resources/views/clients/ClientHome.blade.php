@extends('layouts.clients')

@section('content')
    <h1>Trang chủ</h1>
    <x-package-alert type="success" :content="$orderStatus"/>
    <x-package-button></x-package-button>
@endsection

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Home Sidebar</h3>
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