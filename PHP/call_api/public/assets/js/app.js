$('.modal-submit-btn').on('click', function() {
    let form = $(this).parent().parent().find('form');
    console.log(form.attr('_method'))
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
            Accept: 'application/json'
        },
        data: {
            _method: form.attr('_method'),
            name: form.find('[name=name]').val(),
            description: form.find('[name=description]').val(),
            price: form.find('[name=price]').val(),
        },
        success: function(data) {
            $('.modal.fade').modal('hide')
            $('#result').html('')

            for (let item of JSON.parse(data).data) {
                $('#result').append(
                    '<div class="col-md-3"> <div class="card"> <img src="https://picsum.photos/260" class="card-img-top" alt="..."> <div class="card-body"> <h5 class="card-title">' + item.name + '</h5> <p class="card-text">' + item.description + '</p> <p class="card-text">Price: ' + item.price + '</p> <div class="d-flex justify-content-between align-items-center"> <a href="" class="btn btn-primary">Buy now</a> <i class="fa-regular fa-circle-xmark text-danger" style="font-size: 38px;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#delete-id-' + item.id + '"></i> <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-id-' + item.id + '">Edit</span> </div> </div> </div> </div>' + '<div class="modal fade" id="edit-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Sửa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="post"> <p class="mb-3 mt-3 h6 d-block">' + item.name + '</p> <input type="hidden" name="_token" value="{{csrf_token()}}"> <input type="hidden" name="_method" value="PUT"> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="name"> <label for="">Tên</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="description"> <label for="">Chi tiết sản phẩm</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="price"> <label for="">Giá tiền</label> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Lưu thay đổi</button> </div> </div> </div> </div>' +
                    '<div class="modal fade" id="delete-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Xóa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="POST"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="{{csrf_token()}}"> <div class="mb-2"> <span class="h6">Tên sản phẩm: ' + item.name + '</span> </div> <div class="mb-2"> <span class="h6">Giá tiền: ' + item.price + '</span> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Xóa sản phẩm</button> </div> </div> </div> </div>'
                );
            }
        }
    })
})

function search() {
    $.ajax({
        url: 'http://long.com:8000/api/product/search',
        method: 'GET',
        data: {
            keyword: $('#search [name=keyword]').val()
        },
        success: function(data) {
            $('#result').html('')

            for (let item of data) {
                $('#result').append(
                    '<div class="col-md-3"> <div class="card"> <img src="https://picsum.photos/260" class="card-img-top" alt="..."> <div class="card-body"> <h5 class="card-title">' + item.name + '</h5> <p class="card-text">' + item.description + '</p> <p class="card-text">Price: ' + item.price + '</p> <div class="d-flex justify-content-between align-items-center"> <a href="" class="btn btn-primary">Buy now</a> <i class="fa-regular fa-circle-xmark text-danger" style="font-size: 38px;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#delete-id-' + item.id + '"></i> <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-id-' + item.id + '">Edit</span> </div> </div> </div> </div>' + '<div class="modal fade" id="edit-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Sửa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="post"> <p class="mb-3 mt-3 h6 d-block">' + item.name + '</p> <input type="hidden" name="_token" value="' +
                    $('[name=_token]')[0].value + '"> <input type="hidden" name="_method" value="PUT"> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="name"> <label for="">Tên</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="description"> <label for="">Chi tiết sản phẩm</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="price"> <label for="">Giá tiền</label> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Lưu thay đổi</button> </div> </div> </div> </div>' +
                    '<div class="modal fade" id="delete-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Xóa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="POST"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="' +
                    $('[name=_token]')[0].value + '"> <div class="mb-2"> <span class="h6">Tên sản phẩm: ' + item.name + '</span> </div> <div class="mb-2"> <span class="h6">Giá tiền: ' + item.price + '</span> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Xóa sản phẩm</button> </div> </div> </div> </div>'
                );
            }
        }
    })
}

var bearerToken = 'Bearer ' + $('#bearer-token').text();
$(document).ready(function() {
    $(document).on('click', '.page-item .page-link', function(event) {
        event.preventDefault();
        let page = $(this).attr('href');
        $.ajax({
            url: page,
            type: 'GET',
            headers: {
                Authorization: bearerToken,
                Accept: 'application/json'
            },
            success: function(data) {
                $('#result').html('')

                for (let item of data.data) {
                    $('#result').append(
                        '<div class="col-md-3"> <div class="card"> <img src="https://picsum.photos/260" class="card-img-top" alt="..."> <div class="card-body"> <h5 class="card-title">' + item.name + '</h5> <p class="card-text">' + item.description + '</p> <p class="card-text">Price: ' + item.price + '</p> <div class="d-flex justify-content-between align-items-center"> <a href="" class="btn btn-primary">Buy now</a> <i class="fa-regular fa-circle-xmark text-danger" style="font-size: 38px;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#delete-id-' + item.id + '"></i> <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-id-' + item.id + '">Edit</span> </div> </div> </div> </div>' + '<div class="modal fade" id="edit-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Sửa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="post"> <p class="mb-3 mt-3 h6 d-block">' + item.name + '</p> <input type="hidden" name="_token" value="' +
                        $('[name=_token]')[0].value + '"> <input type="hidden" name="_method" value="PUT"> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="name"> <label for="">Tên</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="description"> <label for="">Chi tiết sản phẩm</label> </div> <div class="form-floating mb-3"> <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder=" " name="price"> <label for="">Giá tiền</label> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Lưu thay đổi</button> </div> </div> </div> </div>' +
                        '<div class="modal fade" id="delete-id-' + item.id + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Xóa sản phẩm</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <form action="http://long.com:8080/PHP/call_api/public/product/' + item.id + '" method="POST"> <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="' +
                        $('[name=_token]')[0].value + '"> <div class="mb-2"> <span class="h6">Tên sản phẩm: ' + item.name + '</span> </div> <div class="mb-2"> <span class="h6">Giá tiền: ' + item.price + '</span> </div> </form> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary modal-submit-btn">Xóa sản phẩm</button> </div> </div> </div> </div>'
                    );
                }
                $('.modal-submit-btn').on('click', function() {
                    $(this).parent().parent().find('form').submit();
                })
            }
        })
    });
});