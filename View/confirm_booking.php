<?php
require_once("../Controller/check_online.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Confirm booking</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .btn-booking {
            background-color: rgba(255, 82, 13, 0.8);
            color: #535c68;

        }

        .btn-booking:hover {
            background-color: rgb(255, 82, 13);
            color: #fefefe;

        }

        .error {
            color: red !important;
        }

        .error-text {
            border: 1px solid red !important;
        }

        #logo_homestay {
            background-color: #FEE140;
            background-image: linear-gradient(90deg, #FEE140 0%, #FA709A 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../Controller/delete_temporary.php" id="logo_homestay">EAT Homestay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <form action="../Controller/add_receipt.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="container mt-3">
            <div class="row">
                <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    echo $id;
                    require_once("../conn.php");
                    $sql = "SELECT * FROM `room`,`temporary` WHERE room.id = '$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $name = $row["name"];
                        $type = $row["type"];
                        $price = $row["price"];
                        $image = $row["image"];
                        $checkin = $row["checkin"];
                        $checkout = $row["checkout"];
                        $amount = $row["amount"];
                        $ngay = ((int) substr($checkout, 0, 2)) - ((int) substr($checkin, 0, 2));
                    }
                }
                ?>
                <!-- Post Content -->
                <div class="col-lg-7 my-5">
                    <!-- Title -->
                    <h1 class="mt-4" style="font-family: Montserrat, sans-serif">Chi tiết đặt phòng</h1>
                    <hr>
                    <p class="text-center">Hãy xác nhận thông tin để đặt phòng</p>

                    <hr>

                    <!-- Preview Image -->
                    <div class="container-fluid" style="height: 400px;">
                        <?php

                        if (isset($_GET["id"])) {
                            echo '<img id="expandImg" style="width:100%; height: 400px ;" class="img-fluid" src="../Uploads/' . $image . '">';
                        }
                        ?>
                    </div>
                    <div class="mt-3 font-weight-bold">Loại phòng bạn đặt là:<span style="font-size: 22px"> <?php echo $row["type"] ?> </span>
                        <input type="text" name="type" type="hidden" value="<?php echo $row["type"] ?>" hidden />
                        <a class="font-italic font-weight-light" href="../View/rooms.php" style="text-decoration: underline ; font-size: 12px;">Bạn muốn đổi phòng khác?</a>
                    </div>
                    <hr>

                    <!--Lấy thông tin checkin checkout -->
                    <div class="card my-3">
                        <div class="card-body">
                            <p class="card-text"><b>Check-in:</b>
                                <span><?php echo $row["checkin"]  ?></span>, 2:00 PM
                                <input type="text" name="checkin" type="hidden" value="<?php echo $row["checkin"] ?>" hidden />
                                <br><b> Check-out: </b>
                                <span><?php echo $row["checkout"]  ?></span> , 12:00 PM
                                <input type="text" name="checkout" type="hidden" value="<?php echo $row["checkout"] ?>" hidden />
                        </div>
                    </div>

                    <!-- Lấy thông tin phòng đang chọn -->
                    <div class="card my-3">
                        <div class="card-header">
                            Your price summary
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <p class="card-text">
                                            <b>Tên phòng:</b> <span><?= $row["name"] ?></span>
                                            <input type="text" name="room_name" type="hidden" value="<?php echo $row["name"] ?>" hidden />
                                        </p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="card-text">Giá phòng: <?php echo $price ?>$</p>
                                        <p class="card-text">Số ngày ở:
                                            <?php echo $ngay ?>
                                        </p>
                                        <p class="card-text">Số phòng đặt:
                                            <span> <?php echo $amount ?> </span>
                                            <input type="text" name="amount" type="hidden" value="<?php echo $amount ?>" hidden />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex">
                            <h5>Price</h5>
                            <div class="text-muted ml-auto">
                                <b>
                                    <span name><?php echo $price * $ngay * $amount ?></span>
                                    <input type="text" name="price" type="hidden" value="<?php echo $price * $ngay * $amount ?>" hidden />
                                </b>$
                            </div>
                        </div>
                    </div>
                    <!--/ Post Content -->
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 d-flex my-auto">
                    <!-- Kiểm tra nếu đã đăng nhập sẽ tự thêm thông tin vào -->
                    <?php
                    // Kiểm tra chỉ có usename mới được đặt phòng
                    if (isset($_SESSION["username"])) {
                        $user = $_SESSION['name'];
                        require_once("../conn.php");
                        $sql = "SELECT * FROM guest WHERE username='$user'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $taikhoan = $row["username"];
                            $sdt = $row["phone"];
                            $ten = $row["name"];
                            ?>
                            <!-- Search Widget -->
                            <div class="card my-4">
                                <h5 class="card-header">Thông tin của bạn</h5>
                                <div class="card-body">
                                    <div class="form-row">

                                        <label for="fullname">Name</label>
                                        <input type="text" class="form-control" id="fullname" name="user_name" value="<?php echo $ten ?>" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            This Field cannot be empty.
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $taikhoan ?>" readonly>
                                            <div class="invalid-feedback">
                                                Please Enter a valid email ID
                                            </div>
                                            <div class="valid-feedback">
                                                Looks Good!.
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="confirmEmail">Confirm email</label>
                                            <input type="email" class="form-control" id="confirmEmail" value="<?php echo $taikhoan ?>" readonly>
                                            <div id="validate" class="valid-feedback">
                                                Emails should match
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <label for="mobile">Phone</label>
                                        <input type="tel" pattern=".{10}" class="form-control" id="phone" name="phone" oninput="check(this)" value="<?php echo $sdt ?>" readonly>
                                        <div class="valid-feedback">
                                            Looks Good!.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid amount.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-booking btn-block" type="submit">Book</button>
                                </div>
                            </div>
                        <?php
                            }
                        } else {
                            ?>
                        <div class="card my-4">
                            <h5 class="card-header">Thông tin của bạn</h5>
                            <div class="card-body">
                                <div class="form-row ">

                                    <label for="fullname">Name</label>
                                    <input type="text" class="form-control" id="fullname" name="user_name" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This Field cannot be empty.
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="" required>
                                        <div class="invalid-feedback">
                                            Please Enter a valid email ID
                                        </div>
                                        <div class="valid-feedback">
                                            Looks Good!.
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="confirmEmail">Confirm email</label>
                                        <input type="email" class="form-control" id="confirmEmail" value="" required>
                                        <div id="validate" class="valid-feedback">
                                            Emails should match
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <label for="mobile">Phone</label>
                                    <input type="tel" pattern=".{10}" class="form-control" id="phone" name="phone" oninput="check(this)" value="" required>
                                    <div class="valid-feedback">
                                        Looks Good!.
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid amount.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-booking btn-block" type="submit">Book</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!--/ Condition -->
                </div>
                <!--/ Sidebar -->
            </div>
            <!--/ Row -->
        </div>
        <!--/ Container -->
    </form>
    <!--/ Form -->

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
    <script>
        // Validate Phone number
        function check(input) {
            if (input.length != 10)
                return false;
            return true;
        }
        // Validate Input
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        var email = $("#email").val();
                        var confirmemail = $("#confirmEmail").val();
                        if (email !== confirmemail) {
                            form.classList.add('was-validated');
                            $("#validate").php("Email Should Match");
                            $("#validate").addClass("error");
                            $("#confirmEmail").addClass("error-text");
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            form.classList.add('was-validated');
                            $("#validate").removeClass("error");
                            $("#confirmEmail").removeClass("error-text");
                            $("#validate").php("Looks Good!");
                        }
                    }, false);
                });
            }, false);
        })();
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>