<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <form action="long.com:8000/api/auth/profile" style="border: 1px solid #ccc; padding: 10px;">
                    <input type="hidden" name="token" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb25nLmNvbTo4MDAwXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNjQ4MzAzODM5LCJleHAiOjE2NDgzOTAyMzksIm5iZiI6MTY0ODMwMzgzOSwianRpIjoiMG5XOXJpR3lmRk9EUHUxMiIsInN1YiI6MiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.8ys6XwiyJtg-8FuIFgUE24J9otpjIcVjPFxB0Mm-mVI">
                    <div class="mb-3">
                        <h3>Login</h3>
                        <input type="text" class="form-control" autocomplete="off">
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>