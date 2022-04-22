<?php
$username = $username_2 = $password_2 = "";
echo "<br/>";
if (isset($_POST["fullname"]) and isset($_POST["username"]) and isset($_POST["password"]) and isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $fullname . "<br/>" . $username . "<br/>" . $password . "<br/>";
};
if(isset($_POST["boolean"]) and $_POST["boolean"] == true) {
    header("location: login_success.php?fullname=" . $_POST["fullname_2"]);
};
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registration and Login</title>
</head>
<body>
<style>
    form {
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
            <form action="" method="post" id="form">
                <h1 class="heading">Login</h1>

                <div class="form-group">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="username_2" required id="username" class="form-control" value="<?=$username_2?>">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password_2" required id="password" class="form-control" value="<?=$password_2?>">
                </div>

                <input type="hidden" name="fullname_2" value="<?=$fullname?>">

                <input type="hidden" name="boolean" value="true">

                <input type="submit" value="Submit" class="btn btn-dark" name="submit_2" id="submit">
            </form>
        </div>
    </div>
</div>
<script>
    var Username = "<?=$_POST["username"]?>";
    var Password = "<?=$_POST["password"]?>";
    var Username_2 = document.querySelector("[name = username_2]");
    var Password_2 = document.querySelector("[name = password_2]");
    console.log('<?=$_COOKIE["username"]?>');
    document.getElementById('form').onsubmit = function (e) {
        if (Username == Username_2.value && Password == Password_2.value) {

        } else {
            e.preventDefault();
            alert('Incorrect username or password!!')
        };
    };
</script>
</body>
</html>