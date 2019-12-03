<?php
session_start();
if (isset($_SESSION["message"])) {
    echo $_SESSION["message"];
    unset($_SESSION["message"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Access</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Css/style.css">
    <style>
        .mastbody {
            position: relative;
            height: 100vh;
            min-height: 500px;
            background-color: rgba(0, 0, 0, .6)
        }

        .mastbody::before {
            content: '';
            display: block;
            position: absolute;
            width: 100%;
            height: 100vh;
            min-height: 500px;
            opacity: 0.6;
            background-image: url('https://source.unsplash.com/Uv70aZI2XhM/1920x1080');
            background-repeat: no-repeat;
            background-position: center;
            -ms-background-size: cover;
            -o-background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;
        }
    </style>

</head>

<div class="mastbody">
    <div class="row">
        <!-- Sign in col -->
        <div class="col-md-4 col-lg-6">
            <div class="login d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="mb-4" style="font-weight: 400;">Welcome back!</h3>
                            <!-- Form Sign-in -->
                            <form action="" method="POST" class="form-access">
                                <div class="form-label-group">
                                    <input type="email" id="email-signin" name="username-signin" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="email-signin">Email / Username</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="pwd-signin" name="pwd-signin" class="form-control" placeholder="Password" required>
                                    <label for="pwd-signin">Password</label>
                                </div>

                                <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>

                                <?php
                                if (isset($_POST["username-signin"]) && isset($_POST["pwd-signin"])) {
                                    $username = $_POST["username-signin"];
                                    $password = $_POST["pwd-signin"];
                                    // Admin
                                    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
                                    require_once("../conn.php");
                                    $result = $conn->query($sql);
                                    $data = mysqli_fetch_row($result);
                                    if ($result->num_rows > 0) {
                                        $_SESSION["username"] = $username;
                                        $_SESSION["name"] = $data[1];
                                        $_SESSION["admin"] = $data[5];
                                        header("Location: ../Admin/index.php");
                                    } else {    // Guest
                                        $username = $_POST["username-signin"];
                                        $password = $_POST["pwd-signin"];
                                        $sql = "SELECT * FROM guest WHERE username = '$username' AND password = '$password'";
                                        require_once("../conn.php");

                                        $result = $conn->query($sql);
                                        $data = mysqli_fetch_row($result);
                                        if ($result->num_rows > 0) {
                                            $_SESSION["username"] = $username;
                                            $_SESSION["name"] = $data[1];
                                            $_SESSION["guest"] = $data[5];
                                            header("Location: ../index.html");
                                        } else {
                                            echo "Login Failed";
                                        }
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign in </col> -->

        <!-- Register col -->
        <div class="col-md-8 col-lg-5">
            <div class="card card-signin flex-row my-5" style="height:80vh">
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <!-- Form Register -->
                    <form id="form-register" action="../Controller/add_user.php" method="POST" enctype="multipart/form-data" class="form-access">
                        <div class="form-label-group">
                            <input type="text" id="name-register" name="name" class="form-control" placeholder="Your name" required autofocus>
                            <label for="name-register">Full name</label>
                        </div>

                        <div class="form-label-group">
                            <input type="email" id="email-register" name="username" class="form-control" placeholder="Email address" required>
                            <label for="email-register">Email address</label>
                        </div>

                        <hr>

                        <div class="form-label-group">
                            <input type="password" id="pwd-register" name="password" class="form-control" placeholder="Password" required>
                            <label for="pwd-register">Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="tel" pattern="[0-9]{10}" id="phone-register" name="phone" class="form-control" placeholder="Phone" required>
                            <label for="phone-register">Phone-number</label>
                        </div>

                        <button class="btn btn-lg btn-block text-uppercase" type="submit">Register</button>
                    </form>
                    <hr class="my-4">
                    <a href="../index.html" class="btn btn-info btn-block text-uppercase "><i class="fas fa-home mr-2"></i>Home</a>
                </div>
            </div>
        </div>
        <!-- Register </col> -->
    </div>
</div>

<!-- Scripts -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>