@extends('client.layout')
@section('title')
    Products
@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <span class="nav-link active" data-bs-toggle="modal" data-bs-target="#add-product">Thêm sản
                        phẩm</span>
                </li>

                <li class="nav-item">
                    <span class="nav-link">Xóa sản phẩm</span>
                </li>
            </ul>

            <div class="d-flex" id="search" url="{{route('search')}}">
                @csrf
                <input class="form-control me-2" type="text" name="keyword" placeholder="Tìm kiếm ..."
                    autocomplete="off">
                <input type="submit" value="Tìm kiếm" class="btn btn-outline-info" onclick="search()">
            </div>

            <div>
                <form method="POST" action="{{route('logoutHandle')}}">
                    @csrf
                    <a class="nav-link submit-btn">Logout</a>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="add-product" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>

                    <div class="mb-1">
                        <label class="form-label">Mô tả</label>
                        <input type="text" name="description" class="form-control form-control-sm">
                    </div>

                    <div class="mb-1">
                        <label class="form-label">Giá tiền</label>
                        <input type="text" name="price" class="form-control form-control-sm">
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" name="thumbnail">
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary modal-submit-btn">Thêm sản phẩm</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" id="result">
        @if (!empty($data))
        @foreach ($data->data as $key => $product)
        <div class="col-md-3">
            <div class="card">
                <img src="https://picsum.photos/260" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text">Price: {{$product->price}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="" class="btn btn-primary">Buy now</a>
                        <i class="fa-regular fa-circle-xmark text-danger" style="font-size: 38px;cursor:pointer;"
                            data-bs-toggle="modal" data-bs-target="#delete-id-{{$product->id}}"></i>
                        <span class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit-id-{{$product->id}}">Edit</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit-id-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('product.update', $product->id)}}" method="post" _method="PUT">
                            <p class="mb-3 mt-3 h6 d-block">{{$product->name}}</p>
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" autocomplete="off"
                                    placeholder=" " name="name">
                                <label for="">Tên</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" autocomplete="off"
                                    placeholder=" " name="description">
                                <label for="">Chi tiết sản phẩm</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" autocomplete="off"
                                    placeholder=" " name="price">
                                <label for="">Giá tiền</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary modal-submit-btn">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delete-id-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" _method="DELETE">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <div class="mb-2">
                                <span class="h6">Tên sản phẩm: {{$product->name}}</span>
                            </div>
                            <div class="mb-2">
                                <span class="h6">Giá tiền: {{$product->price}}</span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary modal-submit-btn">Xóa sản phẩm</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-danger">Nothing is here!</div>
        @endif
    </div>
</div>
{{-- <div id="result"></div> --}}
<nav>
    <ul class="pagination">
        @foreach ($data->links as $key => $item)
        <li class="page-item">
            <a href="{{$item->url}}" class="page-link">{{$item->label}}</a>
        </li>
        @endforeach
    </ul>
</nav>


<div class="navbar navbar-light bg-light" id="bearer-token">{{$token}}</div>

<script>
    $('.submit-btn').on('click', function () {
        $(this).parent().submit();
        
    })

    
</script>
@endsection