<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include_once "dbconnect.php";
$obj = new dbconnection;
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $result = $obj->login($email, $pass);
}

// if (isset($_POST['email']) == true &&  empty($_POST['email'] == false)) {
//     $email_add = $_POST['email'];
//     if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
//     } else {
//         echo "not validate";
//     }
// }

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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> <?php echo $_SESSION['alert']; ?>
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
                    <form method="post" >

                        <!-- email start -->
                        <div class="form-floating mb-3">
                            <input name="email" type="text" class="form-control" onchange="return validateadmit_panel()" autocomplete="off" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            <span id="text"></span>
                        </div>
                        <!-- email end -->

                        <!-- password start -->
                        <div class="form-floating">
                            <input name="pass" type="password" class="form-control" onchange="return validateadmit_panel()" autocomplete="off" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <span id="textpass"></span>
                        </div>
                        <!-- password end -->
                        <button type="submit" name="login" onclick=" return validateadmit_panel()" class="btn btn-primary one mt-3">Login</button>

                    </form>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>



        <script>
            function validateadmit_panel() {
                var email = document.getElementById('floatingInput').value;
                var span = document.getElementById('text')
                var regex = /^\s*$/;
                var emairegex = /^[a-zA-Z0-9+_\.\-]+[@][a-z]+\.[a-z]{2,3}$/;
                if (email.match(regex)) {
                    span.innerHTML = "**please Don't use space";
                    return false;
                } else {
                    span.innerHTML = "";
                }
                if (email.match(emairegex)) {
                    span.innerHTML = "";

                } else {
                    span.innerHTML = "**invalid Email"
                    return false;
                }



                var password = document.getElementById('floatingPassword').value;
                var spanpass = document.getElementById('textpass');
                var passregex = /^[a-zA-Z0-9!@#$%^&*]+$/;
                var regexpass = /^\s*$/;
                if (password.match(regexpass)) {
                    spanpass.innerHTML = "**please enter correct password";
                    return false;
                } else {
                    spanpass.innerHTML = "";

                }

                if (password.match(passregex)) {
                    spanpass.innerHTML = "";

                } else {
                    spanpass.innerHTML = "**please enter correct password"
                    return false;
                }

            }
        </script>
        

        <!-- JavaScript Bundle with Popper -->
        <!-- <script scr="./js/admin.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>