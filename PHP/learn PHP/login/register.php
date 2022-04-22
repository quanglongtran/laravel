<?php
session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $readyToLogin = false;
    } else {
        $readyToLogin = false;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Register Page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col col-lg-5 col-md-8 offset-lg-3 offset-md-2 col-sm-12">
            <form action="" style="border: 1px solid #ccc;border-radius: 4px; padding: 20px" id="form" method="post">
                <h2>Register</h2>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control form-control-sm">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm">
                </div>

                <div class="form-group">
                    <label for="cf_password">Confirm password:</label>
                    <input type="password" name="cf_password" id="cf_password" class="form-control form-control-sm">
                </div>

                <div class="form-group">
                    <label for="fullname">Full name:</label>
                    <input type="text" name="fullname" id="fullname" class="form-control form-control-sm">
                </div>

                <div class="form-group">
                    <label for="birthday" class="form-label">Date of birthday: </label>
                    <input type="text" id="birthday" class="form-control form-control-sm">
                    <small style="color: #666">mm/dd/yyyy</small>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="form-control form-control-sm">
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" value="Register" class="btn btn-dark">
                    <a href="login.php" class="card-link" style="font-size: 20px; color: #333">Login &#8594;</a>
                </div>

                <div id="result"></div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    if("<?=$readyToLogin?>" == true) {
        document.write('<div class="card">sadgjhasd</div>')
    }
    $('#birthday').datepicker();
    $('input').focus(function () {
        $('#result').html('')
    })
    $('#form').submit((e) => {
        e.preventDefault();
        $.ajax({
            url: "form-register.php",
            type: "post",
            datatype: "text",
            data: {
                email: $('#email').val(),
                password: $('#password').val(),
                cf_password: $('#cf_password').val(),
                fullname: $('#fullname').val(),
                birthday: $('#birthday').val(),
                address: $('#address').val()
            },
            success: function (result) {
                $('#result').html(result);
                // $('html').html('')
            }
        })
    })
</script>
</html>