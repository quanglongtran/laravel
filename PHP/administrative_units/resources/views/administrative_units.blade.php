<!DOCTYPE html>
<html>

<head>
	<title>Đơn vị hành chính</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
	<style>
		form,
		.result {
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 8px;
			box-sizing: border-box;
		}

		.close {
			float: right;
			font-size: 25px;
			cursor: pointer;
		}

		.close:hover {
			opacity: 0.6;
		}

		.result .content {
			height: calc(100% - 40px);
			padding: 20px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.result .content div {
			text-transform: capitalize;
			font-size: 20px;
		}

		.separator {
			margin: 0 5px;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-5 offset-1">
				<form action="" method="get" class="form">
					<div class="mb-3">
						<h4 class="mb-2">City</h4>
						<div class="dropdown">
							<span class="form-control dropdown-toggle" data-bs-toggle="dropdown">
								Dropdown link
							</span>

							<ul class="dropdown-menu select-city" aria-labelledby="dropdownMenuLink"></ul>
						</div>
					</div>

					<div class="mb-3">
						<h4 class="mb-2">District</h4>
						<div class="dropdown">
							<span class="form-control dropdown-toggle" data-bs-toggle="dropdown">
								Dropdown link
							</span>

							<ul class="dropdown-menu select-district" aria-labelledby="dropdownMenuLink"></ul>
						</div>
					</div>

					<div class="mb-3">
						<h4 class="mb-2">Ward</h4>
						<select class="form-select select-ward" data-long-toggle="select"
							data-long-target=".content .ward" aria-label="Default select example">

						</select>
					</div>

					<input type="submit" value="Submit" class="btn btn-primary btn-block">
				</form>
			</div>

			<div class="col-5">
				<div class="result">
					<h5 class="mb-3">Reuslt<i class="fa-regular fa-xmark close"></i></h5>
					<div class="content">
						<div class="city">
							dfsasd
						</div>

						<div class="separator separator_city">/</div>

						<div class="district">
							asdas
						</div>

						<div class="separator separator_district">/</div>

						<div class="ward">
							asdasd
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$('.form').on('click', function(e) {
        e.preventDefault();
    })
    $('.result').css('height', $('.form').css('height'));

    $.ajax({
        url: '{{route('city')}}',
        success: function(data) {
            $('.select-ward').html('');
            $('.select-district').html('')
            $.each(data, function(index, item) {
                $('.select-city').append(
                    '<li code="' + item.city_code + '"><a class="dropdown-item">' + item.city_name + '</a></li>'
                )
            })

            $(".select-city>li").on("click", function() {
                $.ajax({
                    url: '{{route('district')}}',
                    data: {
                        city_code: $(this).attr('code')
                    },
                    success: function(data) {
                        $('.select-ward').html('');
                        $('.select-district').html('')
                        $.each(data, function(index, item) {
                            $('.select-district').append(
                                '<li code="' + item.district_code + '"><a class="dropdown-item">' + item.district_name + '</a></li>'
                            )
                        })

						$(".select-district>li").on("click", function() {
							$.ajax({
								url: '{{route('ward')}}',
								data: {
									district_code: $(this).attr('code'),
								},
								success: function(data) {
									$.each(data, function(index, item) {
                            $('.select-district').append(
                                '<li code="' + item.district_code + '"><a class="dropdown-item">' + item.district_name + '</a></li>'
                            )
                        })
								}
							})
						})
                    }
                })
            })
        }
    })

    // $('.select-district').on('change', function (e) {
    // 	$.ajax({
    // 		url: '{{route('ward')}}',
    // 		data: {
    // 			district_code: $(this).val()
    // 		},
    // 		success: function(data) {
    // 			$('.select-ward').html('')
    // 			$.each(data, function(index, item) {
    // 				$('.select-ward').append('<option value="'+item.ward_id+'" unit-name="'+item.ward_name+'">'+item.ward_name+'</option>')
    // 				// console.log(item.ward_name)
    // 		})
    // 		}
    // 	})
    // });
</script>

</html>