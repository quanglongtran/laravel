<?php
    $a = $b = $cal = $result = "";
    if(!empty($_POST)) {
        if (isset($_POST["a"])) {
            $a = $_POST["a"];
        };
        if (isset($_POST["b"])) {
            $b = $_POST["b"];
        };
        if (isset($_POST["cal"])) {
            $cal = $_POST["cal"];
        };
    }

switch ($cal) {
        case "+":
            $result = $a + $b;
            break;
        case "-":
            $result = $a - $b;
            break;
        case "*":
            $result = $a * $b;
            break;
        case "/":
            $result = $a / $b;
            break;
};
    echo $result;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Document</title>
</head>
<body>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    table{
        width: 350px;
        height: auto;
        border: 5px double #ccc;
        /*padding-top: 20px;*/
        margin: 60px auto;
        border-radius: 4px;
    }
    thead{
        width: 85%;
        height: 60px;
        margin: 0 auto;
        border: 1px solid;
    }
    th{
        height: 100%;
        text-align: center;
        font-size: 25px;
    }
    td{
        width: 35px;
        height: 66px;
        border: 1px solid #aaa;
    }
    td input{
        display: block;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
</style>

<form action="" method="get" id="myForm">
    <input type="number" name="a" id="" placeholder="Enter A" required value="<?=$a?>">
    <input type="number" name="b" id="" placeholder="Enter B" required value="<?=$b?>">
    <select name="cal" id="" required>
        <option value="">Select operator</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
<!--    <input type="text" name="cal" placeholder="Enter Cal">-->
    <input type="submit" value="Submit">

    <p>Kết quả: <?=$result?></p>
</form>

<table>
    <thead>
        <th colspan="5">
            Louis Vuitton
        </th>
    </thead>
    <tbody>
        <tr>
            <td colspan="5"><input type="text" name="" id="output" value="<?=($a.$cal.$b."=".$result)?>" readonly disabled></td>
        </tr>
        <tr>
            <td><input type="button" value="7"></td>
            <td><input type="button" value="8"></td>
            <td><input type="button" value="9"></td>
            <td><input type="button" value="/"></td>
            <td><input type="button" value="C"></td>
        </tr>

        <tr>
            <td><input type="button" value="4"></td>
            <td><input type="button" value="5"></td>
            <td><input type="button" value="6"></td>
            <td><input type="button" value="*"></td>
            <td><input type="button" value="AC"></td>
        </tr>

        <tr>
            <td><input type="button" value="1"></td>
            <td><input type="button" value="2"></td>
            <td><input type="button" value="3"></td>
            <td><input type="button" value="-"></td>
            <td rowspan="2"><input type="button" value="="></td>
        </tr>

        <tr>
            <td colspan="2"><input type="button" value="0"></td>
            <td><input type="button" value="."></td>
            <td><input type="button" value="+"></td>
        </tr>
    </tbody>
</table>

<script>
    $(function () {
        $("input").click(function () {
            var v = $(this).val();
            switch (v) {
                case "+":
                case "-":
                case "*":
                case "/":
                    $("[name = cal]").val(v);
                    break;
                case "=":
                    //
                    $("#myForm").submit();
                    break;
                    case "AC":
                        $("[name = a]").val("");
                        $("[name = cal]").val("");
                        $("[name = b]").val("");
                        break;
                default:
                    if($("[name = cal]").val() != "") {
                        $("[name = b]").val($("[name = b]").val() + v)
                    } else {
                        $("[name = a]").val($("[name = a]").val() + v);
                    }
                    break;
            }

            $("#output").val($("[name = a]").val() + $("[name = cal]").val() + $("[name = b]").val())
        });
    });
</script>
</body>
</html>