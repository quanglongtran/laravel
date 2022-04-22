<?php
session_start();
if (isset($_SESSION['boolean']) && $_SESSION['boolean'] == true) {
    header('location: user.php');
    echo "success";
}
if (isset($_COOKIE['regsuccess'])) {
    $success = true;
} else {
    $success = false;
}
$email = $password = '';
if (isset($_COOKIE['email']) && !empty($_COOKIE['email']) && !empty($_COOKIE['password']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    $checked = true;
} else {$checked = false;}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="row align-items-center" id="success">
        <div class="col col-lg-5 offset-lg-4">
            <div class="alert alert-success">Registered an account successfully</div>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-7 offset-lg-3">
            <form method="post" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px" id="form">
                <h1 class="card-title">Login</h1>
                <div class="form-group">
                    <label for="username" class="form-label">Email: </label>
                    <input type="email" id="email" class="form-control" required value="<?=$email?>">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password: </label>
                    <input type="password" id="password" class="form-control" required value="<?=$password?>">
                </div>

                <div class="form-group form-check d-flex justify-content-end">
                    <input type="checkbox" id="remember" class="form-check-input" style="margin-right: 40px;" value="ok">
                    <label for="remember" class="form-check-label" style="margin-right: 65px;" id="remember">Remember me</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="register.php" class="card-link" style="font-size: 20px; color: #333">&#8592; Register</a>
                    <input type="submit" value="Login" class="btn btn-dark" id="submit">
                </div>

                <div id="alert"></div>
            </form>
        </div>
    </div>

    <div class="row" id="add_user">
        <div class="col col-lg-4 offset-lg-4">
            <div class="card">
                <form class="card-body" id="add-form">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 15px;">Add</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="add_result"></div>
<script>
    if ('<?=$success?>' == true) {
        $('#success').css("display", "block")
    } else {
        $('#success').css("display", "none")
    }

    var remember;
    window.onload = function () {
        remember = $('#remember').is(':checked') ? 'yes' : 'no';
    }
    $('#remember').on('change', function () {
        remember = $('#remember').is(':checked') ? 'yes' : 'no';
    })

    if ('<?=$checked?>' == true) {
        $('#remember').attr('checked', true);
        console.log('<?=$checked?>');
    } else {
        $('#remember').attr('checked', false);
        console.log('<?=$checked?>');
    }
    $('#add_user').slideUp(0)
    document.getElementById('form').addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            url: "form-login.php",
            type: "post",
            dataType: "text",
            data: {
                email: $('#email').val(),
                password: $('#password').val(),
                remember: remember
            },
            success: function (result) {
                $('#alert').html(result)
            }
        });
        if ($('#email').val() == 'add@gamil.com' && $('#password').val() == 'ok') {
            $('#add_user').slideDown('slow')
        }
    })

    $('#add-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'add_user.php',
            type: 'post',
            dataType: 'text',
            data: $(this).serializeArray(),
            success: function (response) {
                $('#add_result').html(response)
            }
        })
    })
</script>
</body>
</html>
