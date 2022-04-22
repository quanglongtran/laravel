<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Pagination ajax</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form class="d-flex col-lg-5 offset-lg-4" id="search_form">
                <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-outline-primary" type="submit">Search</button> -->
            </form>
        </div>
    </div>

    <br>

    <div class="container" id="pagination_data">

    </div>
</body>
<script>
    load_data();

    function load_data(page, keyword) {
        $.ajax({
            url: 'pagination.php',
            type: 'post',
            data: {
                page: page,
                keyword: keyword
            },
            success: function(data) {
                $('#pagination_data').html(data)
            }
        })
    }

    $(document).on('click', '.pagination_link', function(e) {
        e.preventDefault();
        load_data($(this).attr("id"), $(this).attr("keyword"))
    })

    $('#search').on('input changeproperty', function() {
        $.ajax({
            url: 'pagination.php',
            type: 'post',
            dataType: 'text',
            data: {
                keyword: $('#search').val()
            },
            success: function(data) {
                $('#pagination_data').html(data)
            }
        })
    })
</script>

</html>