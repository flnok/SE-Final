<?php
require_once("../Controller/check_online.php");
require_once("../Controller/check_admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Account</title>

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

        .masthead {
            position: relative;
            height: 100vh;
            min-height: 500px;
            width: 100%;
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
                    <li class="nav-item ">
                        <a class="nav-link" href="../Controller/delete_temporary.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <div class="card border-dark my-5">
                        <!-- nav -->
                        <div class="card-header">
                            <ul class="nav nav-pills mb-3 justify-content-around" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard" data-toggle="pill" href="#dashboard-content" role="tab" aria-controls="dashboard-content" aria-selected="true">Thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="history" data-toggle="pill" href="#history-content" role="tab" aria-controls="history-content" aria-selected="false">Lịch sử</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Controller/sign_out.php" class="nav-link btn btn-outline-danger" style="cursor: pointer;">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <?php
                            $user = $_SESSION['name'];
                            require_once("../conn.php");
                            $sql = "SELECT * FROM guest WHERE username='$user'";
                            $result = $conn->query($sql);

                            if ($result->num_rows == 1) {
                                $row = $result->fetch_assoc();
                                $account = $row["username"];
                                $phone = $row["phone"];
                                $name = $row["name"];
                            }
                            ?>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="dashboard-content" role="tabpanel" aria-labelledby="dashboard">
                                    <!-- dashboard content -->
                                    <div class="container-fluid d-flex">
                                        <div class="card w-100 shadow mb-3 mx-auto">
                                            <div class="card-header" style="background-color: #2B3A42">
                                                <h5 class="card-title text-uppercase text-center text-light">
                                                    <?php echo $user ?>
                                                </h5>
                                            </div>
                                            <!-- card header -->
                                            <div class="card-body" style="background-color: #BDD4DE; color: #FF530D">
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Name:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="text-center mx-auto">
                                                            <?php echo $name ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Email:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="text-center mx-auto">
                                                            <?php echo $account ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Phone:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="text-center mx-auto">
                                                            <?php echo $phone ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card body -->
                                        </div>
                                        <!-- card -->
                                    </div>
                                    <!-- container -->
                                </div>

                                <!-- History -->
                                <div class="tab-pane fade" id="history-content" role="tabpanel" aria-labelledby="history">
                                    <div class="container-fluid d-flex">
                                        <div class="card w-100 border-info mb-3 m-auto">
                                            <div class="card-header bg-dark">
                                                <h5 class="card-title text-uppercase text-success">
                                                    Lịch sử đặt phòng của bạn
                                                </h5>
                                            </div>

                                            <div class="card-body bg-dark text-info">
                                                <table class="table table-light table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Ngày đặt</th>
                                                            <th>Ngày trả</th>
                                                            <th>Phòng</th>
                                                            <th>Số tiền thanh toán</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require_once("../conn.php");
                                                        $sql = "SELECT * FROM receipt
														WHERE email ='$user' ";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row["checkin"] ?></td>
                                                                    <td><?php echo $row["checkout"] ?></td>
                                                                    <td><?php echo $row["name"] ?></td>
                                                                    <td><?php echo $row["price"] ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--/ Card -->
                                    </div>
                                    <!--/ Container -->
                                </div>
                                <!--/ History -->
                            </div>
                            <!--/ Page Card-Content -->
                        </div>
                        <!--/ Page Card -->
                    </div>
                </div>
            </div>
        </div>
    </header>


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