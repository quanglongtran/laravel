<?php
session_start();
if (isset($_SESSION['boolean']) && $_SESSION['boolean'] == 'true') {

} else {
    header("location: login.php");
}
//if (isset($_POST['logout'])) {
//    session_unset();
//}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>User Page</title>
</head>
<body>
<div class="container">
    <div class="row align-items-end" style=" height: 300px">
        <div class="col col-lg-8 offset-lg-2">
            <div class="card text-center">
                <div class="card-body" style="min-height: 200px">
                    <div class="card-title d-flex" style="justify-content: space-evenly">
                        <h5>User: <?= $_SESSION['fullname'] ?></h5>
                        <h5>User ID : <?= $_SESSION['id'] ?></h5>
                    </div>
                    <div class="justify-content-around d-flex">
                        <div class="btn btn-primary" data-toggle="collapse" data-target="#edit">Edit</div>
                        <div class="btn btn-primary" data-toggle="modal" data-target="#delete">Delete</div>
                        <a href="login.php" class="btn btn-primary" onclick="logout()">Logout</a>
                    </div>
                    <div class="collapse" id="edit">
                        <div class="btn btn-info" data-toggle="modal" data-target="#edit-fullname">Full name</div>
                        <div class="btn btn-info" data-toggle="modal" data-target="#edit-password">Password</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-fullname">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><span>Old name: </span><span id="old_name"><?= $_SESSION['fullname'] ?></span></h5>

                <form id="form-rename" action="" method="post">
                    <div class="form-group">
                        <label for="new_name" class="form-label">New name: </label>
                        <input type="text" id="new_name" name="new_name">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Enter password: </label>
                        <input type="password" id="password" name="password">
                    </div>

                    <input type="hidden" value="<?= $_SESSION['email'] ?>" id="email" name="email">

                    <div id="result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="edit_new_name">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit-password">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form-change-password" action="" method="post">
                    <div class="form-group">
                        <label for="old_password" class="form-label">Old password: </label>
                        <input type="password" id="old_password" name="old_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="new_password" class="form-label">New password: </label>
                        <input type="password" id="new_password" name="new_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cf_new_password" class="form-label">Confirm new password: </label>
                        <input type="password" id="cf_new_password" name="cf_new_password" class="form-control">
                    </div>

                    <input type="hidden" value="<?= $_SESSION['email'] ?>" id="email" name="email">

                    <div id="result_2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark" id="edit_new_password">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="delete-form">
                    <div class="card-title"><h5>User: <?= $_SESSION['fullname'] ?></h5></div>
                    <div class="form-group">
                        <label for="password_delete">Passoword: </label>
                        <input type="password" name="password_delete" id="password_delete" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cf_password_delete">Confirm password: </label>
                        <input type="password" name="cf_password_delete" id="cf_password_delete" class="form-control">
                    </div>

                    <input type="hidden" name="email_delete" id="email_delete" value="<?=$_SESSION['email']?>">

                    <div id="delete_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"
        integrity="sha512-QE2PMnVCunVgNeqNsmX6XX8mhHW+OnEhUhAWxlZT0o6GFBJfGRCfJ/Ut3HGnVKAxt8cArm7sEqhq2QdSF0R7VQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#new_name').on('input propertychange', () => {
        if ($('#new_name').val() == "<?=$_SESSION['fullname']?>") {
            $('#edit_new_name').attr('disabled', 'disabled').css('cursor', 'default')
        } else {
            $('#edit_new_name').removeAttr('disabled').css('cursor', 'pointer')
        }
    });

    $('#new_password').on('input propertychange', () => {
        if ($('#old_password').val() == $('#new_password').val()) {
            $('#edit_new_password').attr('disabled', 'disabled').css('cursor', 'default')
        } else {
            $('#edit_new_password').removeAttr('disabled').css('cursor', 'pointer')
        }
    });

    function logout() {
        $.ajax({
            url: "logout.php",
            type: "post",
            dataType: "text",
            data: {
                logout: "true"
            },
            success: function (result) {

            }
        })
    }

    $('#form-rename').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'rename.php',
            type: 'post',
            dataType: 'text',
            data: $("#form-rename").serializeArray(),
            success: function (response) {
                $('#result').html(response);

            }
        })
    })

    $('#form-change-password').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'change-password.php',
            type: 'post',
            dataType: 'text',
            data: $("#form-change-password").serializeArray(),
            success: function (response) {
                $('#result_2').html(response);

            }
        })
    })

    $('#delete-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'delete.php',
            type: 'post',
            dataType: 'text',
            data: $("#delete-form").serializeArray(),
            success: function (response) {
                $('#delete_result').html(response)
            }

        })
    })
</script>
</body>
</html>