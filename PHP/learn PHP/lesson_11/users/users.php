<?php
// if (!isset($_COOKIE['login']) || $_COOKIE['login'] != 'true') {
// 	header('Location: login.php');
// 	die();
// }

require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
require_once('../db/config.php');

//Cach 2
$user = validateToken();
if ($user == null) {
    header('Location: login.php');
    die();
}

$sql = "select * from users";
$userList = executeResult($sql);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Users Page</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Users Page - <?= $user['fullname'] ?>(<a href="logout.php">logout</a>)</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th style="width: 50px;"></th>
                        <th style="width: 50px;"></th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php
                    $count = 0;
                    $A = 'A';
                    $Asharp = '#A';
                    foreach ($userList as $item) {
                        $ID = "A" . $item["id"];
                        echo '<tr>
			<td>' . (++$count) . '</td>
			<td>' . $item['fullname'] . '</td>
			<td>' . $item['email'] . '</td>
			<td>' . $item['birthday'] . '</td>
			<td>' . $item['address'] . '</td>
			<td><button class="btn btn-primary" data-toggle="collapse" data-target= ' . $Asharp . $count . ' role="button">Edit</button></td>
			<td><button type="button" class="btn btn-danger delete A" data-toggle="modal" data-target="#myModal" id= ' . $item["id"] . '>
                    Delete
                </button>
                
                </td>
		</tr>' . '<tr><td colspan="7" style="padding: 0; text-align: center;">
		    <div class="collapse" id= ' . $A . $count . ' >
		    <div class="btn btn-info B" style="margin: 8px 0" id= ' . $item["id"] . ' old_name="' . $item['fullname'] . '" data-toggle="modal" data-target="#editname">Change full name</div>
		    <div class="btn btn-info"style="margin: 8px 0" id= ' . $A . $count . ' data-toggle="modal" data-target="#editpassword">Change password</div>
            </div>
		</td></tr>';
                    }
                    echo "<div></div>"
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Account</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="mess"></div>
                        <input type="hidden" id="id_2" value="<?= $item['id'] ?>">
                        <input type="hidden" id="fullname_2" value="<?= $item['fullname'] ?>">
                        <label>Enter Password: </label>
                        <input type="password" id="pwdmd5_2">
                        <br>
                        <label>Confirm Password: </label>
                        <input type='password' id="cf_pwdmd5_2"/>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" onclick="confirm()" id="CONFIRM">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editname" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit full name</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5><span style="color: #1234F0">Old name: </span><span id="old_name"></span></h5>
                        <label for="new_name"><h5><span style="color: #1234F0">New name: </span></h5></label>
                        <input type="text" id="new_name" oninput="namesake()" style="border-radius: 4px;border: 1px solid #ccc">
                        <br>
                        <label for="password_3"><h5><span style="color: #1234F0">Password: </span></h5></label>
                        <input type="text" id="password_3" style="border-radius: 4px;border: 1px solid #ccc">
                        <input type="hidden" id="id_3">
                        <input type="hidden" id="fullname_3">
                        <span id="mess_2"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="confirm_2()" id="namesake">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var A = document.getElementsByClassName("A");
        var B = document.getElementsByClassName("B");
        for (let i of A) {
            i.addEventListener('click', function () {
                $("#id_2").val(this.id);

            })
        }
        for (let i of B) {
            i.addEventListener('click', function () {
                $("#id_3").val(this.id);
                $("#fullname_3").val(this.getAttribute('old_name'));
                $("#old_name").text(this.getAttribute('old_name'));
                console.log($("#"));
            });
        }
        var fullname = '<?=$item["fullname"]?>';
        var deleteAccount = document.getElementsByClassName("delete");

        function confirm() {
            if ($("#pwdmd5_2").val() == $("#cf_pwdmd5_2").val()) {
                load_ajax();
            } else {
                $('#mess').html("<div class='alert alert-danger'>Confirm password does not match!!!</div>");
            }
            ;
        };
        function namesake() {
            if($("#new_name").val() == $("#fullname_3").val()){
                $('#namesake').addClass("disabled").css("pointerEvents", "none");
            } else {
                $('#namesake').removeClass("disabled").css("pointerEvents", "fill");
            }
        }
        function confirm_2() {
            if($("#new_name").val() != "" && $("#password_3").val() != "") {

                if($("#fullname_3").val() != $("#new_name").val()) {
                    edit_name();
                } else {
                    alert("");
                }
            } else {
                alert("Please fill all field!!!")
            }
        }

        function load_ajax() {
            $.ajax({
                url: "delete.php",
                type: "post",
                dataType: "text",
                data: {
                    pwdmd5_2: $('#pwdmd5_2').val(),
                    id_2: $('#id_2').val(),
                    fullname_2: $('#fullname_2').val(),
                },
                success: function (result) {
                    $('#mess').html(result);
                }
            });
        }
        function edit_name() {
            $.ajax({
                url: "edit_name.php",
                type: "post",
                dataType: "text",
                data: {
                    id_3: $('#id_3').val(),
                    new_name: $('#new_name').val(),
                    fullname_3: $('#fullname_3').val(),
                    password_3: $('#password_3').val()
                },
                success: function (result) {
                    $('#mess_2').html(result);
                }
            });
        }

    </script>
    </body>
    </html>
<?php
$index = 1;
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
//while ($index <= 200) {
//    $sql = "insert into users (fullname, password, email, birthday, address) values ('User $index', 'aa3a5464ff6880389fd7e809c4652487', 'user$index@gmail.com', '20031014', 'Ha Noi, Viet Nam')";
//    $conn->query($sql);
//    $index++;
//}
?>