<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registration and Login</title>
</head>

<body>

<style>
    form{
        padding: 30px;
        border: 5px double #ccc
    }
    input[type=submit] {
        width: auto;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col col-lg-4 offset-lg-4">
                <form action="login.php" method="post" id="form">
                    <h1 class="heading">Registration</h1>
                    <div class="form-group">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" required id="fullname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" required id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" required id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" required class="form-control" id="confirm_password">
                    </div>

                    <input type="submit" value="Submit" class="btn btn-dark" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>
<script>
    const fullname = document.querySelector('[name = fullname]');
    const username = document.querySelector('[name = username]');
    const password = document.querySelector('[name = password]');
    const confirm_password = document.getElementById('confirm_password');
    document.getElementById('form').onsubmit = function (e) {
        if(password.value !== confirm_password.value) {
            e.preventDefault();
            alert('Confirm password incorrect');
        } else {

        }
    };
</script>
</body>
</html>