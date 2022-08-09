<?php
include_once "dbconnect.php";
$obj = new dbconnection;


if (isset($_POST['submit'])) {
    $content = $_POST['admineditor'];
    $date = date('Y-m-d h:i:s');
    $result = $obj->insert($content, $date);
}

if (!isset($_SESSION['email'])) {
    header("location:adminpanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./m.css">
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>
    <title>Dashboard</title>
</head>
<style>
    .navbar-brand {
        font-size: 40px;
        color: white;
    }
</style>

<body>
    <?php
    if (isset($_SESSION['insert'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> <?php echo $_SESSION['insert']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['insert']);
    }
    ?>
    <?php
    if (isset($_SESSION['update'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> <?php echo $_SESSION['update']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['update']);
    }
    ?>
    <nav class="navbar bg-dark">
        <div class="container">
            <a class="navbar-brand panel">Admin Panel</a>
            <form method="post">
                <button type="submit" name="logout" class="btn btn-danger my-4 offset-5 changebtn" value="Logout">Logout</button>
        </div>
    </nav>

    <div class="editorbg ">
        <div class="py-5">
            <div class="col-8 offset-2 py-5 ">
                <textarea id="admineditor" name="admineditor"></textarea>
                <p id="error"></p>
                <input type="submit" name="submit" value="submit" class="btn btn-success my-3">
            </div>
            </form>
        </div>
    </div>
    <script>
        var editor = CKEDITOR.replace('admineditor');
        CKFinder.setupCKEditor(editor);
        editor.config.extraPlugins = 'youtube,colorbutton,emoji,video,justify,sharedspace,tableresize';
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "dbconnect.php",
                data: {
                    'check_detail_editor': 1,
                },
                dataType: "json",
                success: function(response) {
                    $('body #admineditor').html(response.content)
                   
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location:adminpanel.php");
    }
    ?>
</body>

</html>