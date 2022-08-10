<?php
include_once "dbconnect.php";
$obj = new dbconnection;
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $result = $obj->login($email, $pass);
}

?>

<style>
    .manish {
        margin: -71px 21px 10px 121px;
        color: red;
    }

    .one {
        border: 1px solid blue;
        padding: 2px 13px;
        transition: 1.8s;
        border-radius: 20px;
    }

    .one:hover {
        color: white;
    }

    .one:hover {
        background: blue;
    }

    #text {
        color: red;
    }

    #textpass {
        color: red;
    }
</style>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./m.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php
    if (isset($_SESSION['alert'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>Alert!</strong> <?php echo $_SESSION['alert'];
                                    ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    }
    ?>

    <div class=" py-5 text-center my-bg">
        <i>
            <h1>Admin Panel </h1>
        </i>
        <u>
            <p>Login Here </p>
        </u>
    </div>


    <div class="container py-4 my-5 border ">
        <div class="form-floating mb-3">
            <div class="row py-4 my-5">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 my-5">
                    <form method="post">
                        <!-- email start -->
                        <div class="form-floating mb-3">
                            <input name="email" type="text" class="form-control" value="<?php if(isset($_POST['login'])){ echo $_POST['email'];} ?>" onkeyup="return validateadmit_panel()" autocomplete="off" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            <span id="text"></span>
                        </div>
                        <!-- email end -->

                        <!-- password start -->
                        <div class="form-floating">
                            <input name="pass" type="password" class="form-control" onkeyup="return validateadmit()" autocomplete="off" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <span id="textpass"></span>
                        </div>
                        <!-- password end -->

                        <button type="submit" name="login" id="login" onclick="return validateadmit()" onclick="return validateadmit_panel()" class="btn btn-primary one mt-3">Login</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script>
            function validateadmit_panel() {
                var email = document.getElementById('floatingInput').value;
                var span = document.getElementById('text')
                var regex = /^\s*$/;
                var emairegex = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/
                if (email.match(regex)) {
                    span.innerHTML = "**Space are not allowed";
                    return false;
                } else {
                    span.innerHTML = "";
                }
                if (email.match(emairegex)) {
                    span.innerHTML = "";

                } else {
                    span.innerHTML = "**Please enter correct email address"
                    return false;
                }
            }


            function validateadmit() {
                var password = document.getElementById('floatingPassword').value;
                var spanpass = document.getElementById('textpass');
                var passregex = /^[a-zA-Z0-9!@#$%^&*]+$/;
                var regexpass = /^\s*$/;
                if (password.match(regexpass)) {
                    spanpass.innerHTML = "**Space are not allowed";
                    return false;
                } else {
                    spanpass.innerHTML = "";
                }

                if (password.match(passregex)) {
                    spanpass.innerHTML = "";
                } else {
                    spanpass.innerHTML = "**Please enter Correct Password"
                    return false;
                }

            }
        </script>

        <script>
            window.setTimeout(function()
             {
                $("#alert").slideUp(500, function() 
                {
                    $(this).remove();
                });
            }, 1900);
        </script>


        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>