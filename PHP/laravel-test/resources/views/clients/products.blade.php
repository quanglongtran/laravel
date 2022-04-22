@extends('layouts.clients')

@section('content')
    <h1>Sản phẩm</h1>
@endsection

@section('title')
    {{$title}}
@endsection

{{-- @section('sidebar')
    @parent
    <h3>Product Sidebar</h3>
@endsection --}}

@section('css')
    <style type="text/css">
        header{
            /* background-color: teal; */
        }
    </style>
@endsection

@section('js')
    <script>
        var push = 1;
    </script>
@endsection

@push('scripts')
    <script>
        console.log(push)
        push++
    </script>
@endpush
